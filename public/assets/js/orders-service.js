(function () {
    'use strict';

    var STORAGE_KEY = 'ats_orders_data_v1';

    function toNumber(value) {
        var n = Number(value);
        return Number.isFinite(n) ? n : 0;
    }

    function normalizeStatus(value) {
        var allowed = { pending: true, processing: true, shipped: true, delivered: true, cancelled: true };
        var status = String(value || '').toLowerCase();
        return allowed[status] ? status : 'processing';
    }

    function normalizeItem(item) {
        var qty = Math.max(1, Math.floor(toNumber(item && item.qty) || 1));
        var unitPrice = Math.max(0, Math.round(toNumber(item && (item.unitPrice != null ? item.unitPrice : item.price))));
        return {
            sku: String((item && item.sku) || ''),
            name: String((item && item.name) || 'Product'),
            qty: qty,
            unitPrice: unitPrice,
            lineTotal: unitPrice * qty,
            image: String((item && item.image) || '')
        };
    }

    function createTrackingFromStatus(status) {
        var flow = ['pending', 'processing', 'shipped', 'delivered'];
        var currentIndex = flow.indexOf(status);
        var today = new Date();

        return {
            status: status,
            etaISO: currentIndex < 3 && currentIndex >= 0
                ? new Date(today.getTime() + (3 - currentIndex) * 24 * 60 * 60 * 1000).toISOString()
                : null,
            steps: [
                { key: 'placed', done: currentIndex >= 0 || status === 'cancelled' },
                { key: 'processed', done: currentIndex >= 1 },
                { key: 'transit', done: currentIndex >= 2 },
                { key: 'delivered', done: currentIndex >= 3 }
            ]
        };
    }

    function normalizeOrder(raw) {
        var items = Array.isArray(raw && raw.items) ? raw.items.map(normalizeItem) : [];
        var subtotal = items.reduce(function (sum, item) { return sum + item.lineTotal; }, 0);
        var shipping = Math.max(0, Math.round(toNumber(raw && raw.shipping)));
        var tax = Math.max(0, Math.round(toNumber(raw && raw.tax)));
        var total = subtotal + shipping + tax;
        var status = normalizeStatus(raw && raw.status);

        return {
            id: String((raw && raw.id) || ''),
            dateISO: String((raw && raw.dateISO) || (raw && raw.date) || new Date().toISOString().slice(0, 10)),
            status: status,
            subtotal: subtotal,
            shipping: shipping,
            tax: tax,
            total: total,
            itemCount: items.reduce(function (sum, item) { return sum + item.qty; }, 0),
            items: items,
            tracking: raw && raw.tracking ? raw.tracking : createTrackingFromStatus(status)
        };
    }

    function demoOrders() {
        return [
            normalizeOrder({
                id: 'ATS-2026-10001',
                dateISO: '2026-04-02',
                status: 'processing',
                shipping: 1000,
                tax: 3500,
                items: [
                    { sku: 'ATS-9300', name: 'Cisco Catalyst 9300 Switch', qty: 1, unitPrice: 14200 },
                    { sku: 'ATS-R750', name: 'Dell PowerEdge R750 Server', qty: 1, unitPrice: 21000 },
                    { sku: 'ATS-UAP', name: 'Ubiquiti UniFi Access Point', qty: 1, unitPrice: 2800 }
                ]
            }),
            normalizeOrder({
                id: 'ATS-2026-09974',
                dateISO: '2026-03-17',
                status: 'shipped',
                shipping: 1000,
                tax: 6000,
                items: [
                    { sku: 'ATS-RS1221', name: 'Synology RackStation RS1221+', qty: 2, unitPrice: 26000 },
                    { sku: 'ATS-MX', name: 'Cisco Meraki MX Security Appliance', qty: 1, unitPrice: 33000 }
                ]
            }),
            normalizeOrder({
                id: 'ATS-2026-09851',
                dateISO: '2026-02-09',
                status: 'delivered',
                shipping: 1000,
                tax: 7000,
                items: [
                    { sku: 'ATS-UNITY', name: 'Dell EMC Unity Storage Array', qty: 1, unitPrice: 120000 }
                ]
            }),
            normalizeOrder({
                id: 'ATS-2025-11542',
                dateISO: '2025-12-22',
                status: 'cancelled',
                shipping: 0,
                tax: 3000,
                items: [
                    { sku: 'ATS-SW24', name: 'Managed Switch 24-Port', qty: 2, unitPrice: 14000 }
                ]
            }),
            normalizeOrder({
                id: 'ATS-2025-11209',
                dateISO: '2025-11-08',
                status: 'pending',
                shipping: 0,
                tax: 4500,
                items: [
                    { sku: 'ATS-FW-ENT', name: 'Enterprise Firewall Appliance', qty: 1, unitPrice: 63000 }
                ]
            })
        ];
    }

    function readStoredOrders() {
        try {
            var raw = JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]');
            return Array.isArray(raw) ? raw.map(normalizeOrder).filter(function (order) { return order.id; }) : [];
        } catch (error) {
            return [];
        }
    }

    function writeStoredOrders(orders) {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(orders.map(normalizeOrder)));
    }

    function mergeOrders(primary, fallback) {
        var seen = Object.create(null);
        var merged = [];

        primary.concat(fallback).forEach(function (order) {
            if (!order || !order.id || seen[order.id]) return;
            seen[order.id] = true;
            merged.push(order);
        });

        merged.sort(function (a, b) {
            return String(b.dateISO).localeCompare(String(a.dateISO));
        });

        return merged;
    }

    function getOrders() {
        return mergeOrders(readStoredOrders(), demoOrders());
    }

    function getOrderById(orderId) {
        var id = String(orderId || '').trim().toUpperCase();
        if (!id) return null;
        var orders = getOrders();
        for (var i = 0; i < orders.length; i += 1) {
            if (String(orders[i].id).toUpperCase() === id) return orders[i];
        }
        return null;
    }

    function addOrder(orderInput) {
        var normalized = normalizeOrder(orderInput);
        if (!normalized.id) throw new Error('Order id is required');

        var stored = readStoredOrders();
        var withoutSameId = stored.filter(function (item) {
            return String(item.id).toUpperCase() !== String(normalized.id).toUpperCase();
        });

        writeStoredOrders([normalized].concat(withoutSameId));
        return normalized;
    }

    function statusLabel(status, locale) {
        var key = normalizeStatus(status);
        var ar = {
            pending: '\u0642\u064A\u062F \u0627\u0644\u0627\u0646\u062A\u0638\u0627\u0631',
            processing: '\u0642\u064A\u062F \u0627\u0644\u0645\u0639\u0627\u0644\u062C\u0629',
            shipped: '\u062A\u0645 \u0627\u0644\u0634\u062D\u0646',
            delivered: '\u062A\u0645 \u0627\u0644\u062A\u0633\u0644\u064A\u0645',
            cancelled: '\u0645\u0644\u063A\u064A'
        };
        var en = {
            pending: 'Pending',
            processing: 'Processing',
            shipped: 'Shipped',
            delivered: 'Delivered',
            cancelled: 'Cancelled'
        };
        return locale === 'ar' ? ar[key] : en[key];
    }

    function trackingSummary(order, locale) {
        var data = order && order.tracking ? order.tracking : createTrackingFromStatus(order ? order.status : 'processing');
        var statusText = statusLabel(data.status, locale);
        var etaText = '';

        if (data.status === 'delivered') {
            etaText = locale === 'ar' ? '\u062A\u0645 \u0627\u0644\u062A\u0633\u0644\u064A\u0645' : 'Delivered';
        } else if (data.status === 'cancelled') {
            etaText = locale === 'ar' ? '\u062A\u0645 \u0625\u0644\u063A\u0627\u0621 \u0627\u0644\u0637\u0644\u0628' : 'Order cancelled';
        } else if (data.etaISO) {
            var etaDate = new Date(data.etaISO);
            etaText = locale === 'ar'
                ? '\u0645\u0648\u0639\u062F \u0627\u0644\u062A\u0633\u0644\u064A\u0645 \u0627\u0644\u0645\u062A\u0648\u0642\u0639: ' + etaDate.toLocaleDateString('ar-EG', { year: 'numeric', month: 'short', day: 'numeric' })
                : 'Estimated delivery: ' + etaDate.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
        }

        return {
            status: statusText,
            eta: etaText,
            steps: data.steps || []
        };
    }

    window.ATSOrdersService = {
        storageKey: STORAGE_KEY,
        getOrders: getOrders,
        getOrderById: getOrderById,
        addOrder: addOrder,
        normalizeOrder: normalizeOrder,
        statusLabel: statusLabel,
        trackingSummary: trackingSummary
    };
})();

