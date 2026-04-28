// Catalog/Product static front-end data contract (Phase 7 scaffold)
// This file documents the expected product shape for EN/AR pages.

(function () {
    'use strict';

    const PRODUCT_DATA_CONTRACT = {
        id: 'number|string',
        sku: 'string',
        name_en: 'string',
        name_ar: 'string',
        brand: 'string',
        category_en: 'string',
        category_ar: 'string',
        price: 'number',
        stockLabel_en: 'string',
        stockLabel_ar: 'string',
        image: 'string',
        detailPage_en: 'string', // static route only
        detailPage_ar: 'string', // static route only
    };

    // Expose for future adapters or static data validation scripts.
    window.ATS_PRODUCT_DATA_CONTRACT = PRODUCT_DATA_CONTRACT;
})();

