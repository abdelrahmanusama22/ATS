@extends('layouts.app')

@section('title', 'ATS - Secure Checkout')

@push('styles')
    <style>
        .shipping-method {
            border: 2px solid #DEE1E6;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }
        .shipping-method:hover {
            border-color: #9095A1;
        }
        .shipping-method.active {
            border: 2px solid #E21D2E;
            background-color: #FFFFFF;
            box-shadow: 0px 2px 8px rgba(226, 29, 46, 0.06);
        }
    </style>
@endpush

@section('header')
    <!-- Standard Top Bar (Checkout Version) -->
    <div class="bg-white border-b border-gray-border text-[12px] text-gray-body h-[40px] flex items-center sticky top-0 z-50">
        <div class="max-w-[1280px] w-full mx-auto px-4 md:px-10 lg:px-[40px] flex justify-between items-center">
            <!-- Left Side: Return + Info -->
            <div class="flex items-center gap-4 md:gap-6">
                <a href="{{ route('cart') }}" class="flex items-center gap-1.5 hover:text-primary transition-colors font-bold text-dark group">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:-translate-x-0.5 transition-transform">
                        <path d="M15 18L9 12L15 6"/>
                    </svg>
                    {{ $contentBlocks['checkout_return_cart']->content ?? 'Return to Cart' }}
                </a>
                <span class="hidden md:flex items-center gap-1.5">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    {{ $globalSettings['contact_address'] ?? ($contentBlocks['header_location']->content ?? 'Alexandria, EG') }}
                </span>
                <span class="hidden lg:flex items-center gap-1.5">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                        <path d="m22 7-8.97 5.7a1.93 1.93 0 0 1-2.06 0L2 7"></path>
                    </svg>
                    {{ $globalSettings['contact_email'] ?? ($contentBlocks['header_email']->content ?? 'sales@ats.com') }}
                </span>
            </div>

            <!-- Right Side: Account + Language + Cart -->
            <div class="flex items-center gap-4 md:gap-6">
                <a href="{{ route('lang.switch', app()->getLocale() == 'ar' ? 'en' : 'ar') }}" class="flex items-center gap-1.5 hover:text-dark transition-colors font-medium">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                    {{ app()->getLocale() == 'ar' ? 'English' : 'العربية' }}
                </a>
                <a href="{{ route('account') }}" class="hidden sm:flex items-center gap-1.5 hover:text-dark cursor-pointer transition-colors">{{ $contentBlocks['header_my_account']->content ?? 'My Account' }}</a>
                <a href="{{ route('cart') }}" class="flex items-center gap-1.5 text-primary font-bold">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    {{ $contentBlocks['header_cart']->content ?? 'Cart' }} ( <span class="dropdown-cart-count">0</span> )
                </a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <main class="max-w-[1360px] mx-auto px-4 md:px-10 pt-[24px] md:pt-[40px] pb-32">
        
        <!-- Title & SSL Badge Area -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end border-b border-text-light pb-4 md:pb-6 mb-[24px] md:mb-[32px] gap-3">
            <h1 class="font-heading font-bold text-[24px] md:text-[30px] tracking-[-0.75px] text-text-main">Checkout</h1>
            <div class="bg-white border border-text-light px-3 md:px-4 flex items-center gap-2 rounded-full h-[32px] md:h-[38px]">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" class="shrink-0">
                    <path d="M19 11H5C3.89543 11 3 11.8954 3 13V20C3 21.1046 3.89543 22 5 22H19C20.1046 22 21 21.1046 21 20V13C21 11.8954 20.1046 11 19 11Z" fill="#16A34A" fill-opacity="0.2" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M7 11V7C7 5.67392 7.52678 4.40215 8.46447 3.46447C9.40215 2.52678 10.6739 2 12 2C13.3261 2 14.5979 2.52678 15.5355 3.46447C16.4732 4.40215 17 5.67392 17 7V11" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="text-[12px] md:text-[14px] text-text-muted whitespace-nowrap">Secure SSL</span>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-[48px]">
            <!-- Left Column: Forms -->
            <div class="flex-1 max-w-[862px]">
                
                <div class="flex items-center gap-1.5 md:gap-2 mb-[24px] md:mb-[32px] flex-wrap">
                    <span class="text-[13px] md:text-[14px] font-medium text-text-muted cursor-pointer hover:text-text-main">Cart</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" class="text-text-muted shrink-0" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    
                    <div class="flex items-center gap-1.5 bg-primary-light px-2 md:px-3 py-1 md:py-1.5 rounded-full">
                        <div class="w-5 h-5 rounded-full bg-primary text-white flex items-center justify-center text-[12px] font-medium leading-none">1</div>
                        <span class="text-[13px] md:text-[14px] font-medium text-primary">Shipping</span>
                    </div>
                    
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" class="text-text-muted shrink-0" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    
                    <div class="flex items-center gap-1.5 px-1">
                        <div class="w-5 h-5 rounded-full border border-text-muted text-text-muted flex items-center justify-center text-[12px] font-medium leading-none">2</div>
                        <span class="hidden sm:inline text-[13px] md:text-[14px] font-medium text-text-muted">Payment</span>
                    </div>

                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" class="text-text-muted shrink-0" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>

                    <div class="flex items-center gap-1.5 px-1">
                        <div class="w-5 h-5 rounded-full border border-text-muted text-text-muted flex items-center justify-center text-[12px] font-medium leading-none">3</div>
                        <span class="hidden sm:inline text-[13px] md:text-[14px] font-medium text-text-muted">Review</span>
                    </div>
                </div>

                <!-- Step 1: Shipping Information -->
                <div class="bg-white border border-primary-border rounded-[16px] mb-6 overflow-hidden shadow-[0px_4px_12px_rgba(226,29,46,0.02)] relative">
                    
                    <!-- Section Header -->
                    <div class="bg-white/50 border-b border-text-light p-6 pb-5 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white font-bold text-[16px] leading-[24px]">1</div>
                            <h2 class="font-heading text-[20px] font-medium text-text-main">Shipping Information</h2>
                        </div>
                        <button id="autoFillBtn" class="text-[12px] font-medium text-text-muted bg-gray-50 border border-text-light px-3 py-1.5 rounded-md hover:bg-gray-100 transition-colors">
                            Auto-fill
                        </button>
                    </div>

                    <div class="p-6 pt-[25px]" id="shipping-step-container">
                        
                        <!-- Contact Details -->
                        <h3 class="section-header-uppercase flex items-center gap-2">{{ $contentBlocks['checkout_contact_title']->content ?? 'Contact Details' }}</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-6 mb-8">
                            <div>
                                <label for="checkout-first-name" class="form-label">{{ $contentBlocks['checkout_first_name']->content ?? 'First Name' }} <span class="text-primary">*</span></label>
                                <input id="checkout-first-name" type="text" class="form-input" placeholder="Enter first name" required>
                            </div>
                            <div>
                                <label for="checkout-last-name" class="form-label">{{ $contentBlocks['checkout_last_name']->content ?? 'Last Name' }} <span class="text-primary">*</span></label>
                                <input id="checkout-last-name" type="text" class="form-input" placeholder="Enter last name" required>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="checkout-email" class="form-label">{{ $contentBlocks['checkout_email']->content ?? 'Email Address' }} <span class="text-primary">*</span></label>
                            <input id="checkout-email" type="email" class="form-input" placeholder="name@company.com" required>
                        </div>
                        <p class="text-[12px] text-text-muted mb-6 tracking-wide">Order confirmation will be sent here.</p>

                        <div class="mb-10 pb-[28px] border-b border-text-light">
                            <label for="checkout-phone" class="form-label">Phone Number <span class="text-primary">*</span></label>
                            <input id="checkout-phone" type="tel" class="form-input" placeholder="+20 100 123 4567" required>
                        </div>

                        <!-- Delivery Address -->
                        <h3 class="section-header-uppercase flex items-center gap-2 mt-2">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" class="text-text-muted" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            Delivery Address
                        </h3>

                        <div class="mb-6 mt-6">
                            <label for="checkout-street" class="form-label">Street Address <span class="text-primary">*</span></label>
                            <input id="checkout-street" type="text" class="form-input" placeholder="Building 14, Smart Village" required>
                        </div>

                        <div class="mb-6">
                            <label for="checkout-apartment" class="form-label">Apartment, suite, etc. (optional)</label>
                            <input id="checkout-apartment" type="text" class="form-input" value="Floor 3, Office 302">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-6 mb-6 mt-1">
                            <div>
                                <label for="checkout-city" class="form-label">City <span class="text-primary">*</span></label>
                                <input id="checkout-city" type="text" class="form-input" placeholder="6th of October" required>
                            </div>
                            <div class="relative">
                                <label for="checkout-governorate" class="form-label">Governorate</label>
                                <select id="checkout-governorate" class="form-input appearance-none w-full bg-white text-dark cursor-pointer text-[#171A1F]" required>
                                    <option value="" disabled selected>Select Governorate</option>
                                    <option value="Alexandria">Alexandria</option>
                                    <option value="Aswan">Aswan</option>
                                    <option value="Asyut">Asyut</option>
                                    <option value="Beheira">Beheira</option>
                                    <option value="Beni Suef">Beni Suef</option>
                                    <option value="Cairo">Cairo</option>
                                    <option value="Dakahlia">Dakahlia</option>
                                    <option value="Damietta">Damietta</option>
                                    <option value="Faiyum">Faiyum</option>
                                    <option value="Gharbia">Gharbia</option>
                                    <option value="Giza">Giza</option>
                                    <option value="Ismailia">Ismailia</option>
                                    <option value="Kafr El Sheikh">Kafr El Sheikh</option>
                                    <option value="Luxor">Luxor</option>
                                    <option value="Matrouh">Matrouh</option>
                                    <option value="Minya">Minya</option>
                                    <option value="Monufia">Monufia</option>
                                    <option value="New Valley">New Valley</option>
                                    <option value="North Sinai">North Sinai</option>
                                    <option value="Port Said">Port Said</option>
                                    <option value="Qalyubia">Qalyubia</option>
                                    <option value="Qena">Qena</option>
                                    <option value="Red Sea">Red Sea</option>
                                    <option value="Sharqia">Sharqia</option>
                                    <option value="Sohag">Sohag</option>
                                    <option value="South Sinai">South Sinai</option>
                                    <option value="Suez">Suez</option>
                                </select>
                                <div class="pointer-events-none absolute bottom-0 right-0 flex items-center px-4 h-12 text-gray-body">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                </div>
                            </div>
                        </div>

                        <div class="w-1/2 pr-3 mb-12 pb-[28px] border-b border-text-light">
                            <label for="checkout-zip" class="form-label">Postal / Zip Code</label>
                            <input id="checkout-zip" type="text" class="form-input" placeholder="12577">
                        </div>

                        <!-- Shipping Method -->
                        <h3 class="section-header-uppercase flex items-center gap-2 mt-2">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" class="text-text-muted" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="1" y="3" width="15" height="13"></rect>
                                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                <circle cx="18.5" cy="18.5" r="2.5"></circle>
                            </svg>
                            Shipping Method
                        </h3>

                        <div class="grid grid-cols-2 gap-4 mt-6 items-stretch">
                            <!-- Standard (Active) -->
                            <div id="shipping-standard" class="shipping-method active p-4 pr-10 rounded-[10px] cursor-pointer relative shadow-[0px_2px_8px_rgba(226,29,46,0.06)] flex flex-col h-full">
                                <span class="block text-[14px] font-medium text-text-main mb-0.5">Standard Delivery</span>
                                <span class="block text-[14px] text-text-muted mb-1">3-5 Business Days</span>
                                <span class="block text-[14px] font-medium text-primary mt-auto">Free</span>
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 text-primary shipping-check">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                    </svg>
                                </div>
                            </div>

                            <!-- Express (Inactive) -->
                            <div id="shipping-express" class="shipping-method hover:border-gray-300 p-4 pr-10 rounded-[10px] cursor-pointer bg-white relative flex flex-col h-full">
                                <span class="block text-[14px] font-medium text-text-main mb-0.5">Express Next Day</span>
                                <span class="block text-[14px] text-text-muted mb-1">Delivered Tomorrow</span>
                                <span class="block text-[14px] font-medium text-text-main mt-auto">EGP 250</span>
                            </div>
                        </div>

                        <!-- Action -->
                        <div class="mt-12 flex justify-end">
                            <button id="continuePaymentBtn" class="bg-primary hover:bg-red-700 transition-colors text-white font-medium text-[14px] h-[44px] px-8 rounded-[6px] shadow-sm">
                                Continue to Payment
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Payment Method -->
                <div class="bg-white border border-text-light rounded-[16px] mb-6 shadow-sm overflow-hidden opacity-50 pointer-events-none transition-all duration-500" id="payment-step-container">
                    <div class="bg-background/50 border-b border-text-light p-6 pb-5 flex items-center">
                        <div class="w-8 h-8 rounded-full border-2 border-text-muted/50 flex items-center justify-center text-text-muted/50 font-bold text-[16px]">2</div>
                        <h2 class="font-heading text-[20px] font-medium text-text-muted ml-3">Payment Method</h2>
                    </div>
                    
                    <div class="p-6">
                        <div class="grid grid-cols-3 gap-4 mb-8">
                            <div id="card-credit" class="payment-card border-2 border-primary bg-primary-light/50 h-auto min-h-[110px] p-4 rounded-[12px] flex flex-col items-center justify-center gap-3 cursor-pointer transition-all duration-300 group">
                                <div class="w-10 h-10 rounded-full bg-primary/10 grid place-items-center mb-1 group-hover:scale-110 transition-transform">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#E21D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                        <line x1="1" y1="10" x2="23" y2="10"></line>
                                    </svg>
                                </div>
                                <span class="text-[14px] font-bold text-primary text-center leading-tight px-1">Credit Card</span>
                            </div>
                            <div id="card-bank" class="payment-card border-2 border-text-light bg-white h-auto min-h-[110px] p-4 rounded-[12px] flex flex-col items-center justify-center gap-3 cursor-pointer hover:border-primary/40 hover:bg-background transition-all duration-300 group">
                                <div class="w-10 h-10 rounded-full bg-gray-100 grid place-items-center mb-1 group-hover:scale-110 transition-transform">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#565D6D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="3" y1="9" x2="21" y2="9"></line>
                                        <line x1="9" y1="21" x2="9" y2="9"></line>
                                    </svg>
                                </div>
                                <span class="text-[14px] font-medium text-text-muted text-center leading-tight px-1">Bank Transfer</span>
                            </div>
                            <div id="card-cod" class="payment-card border-2 border-text-light bg-white h-auto min-h-[110px] p-4 rounded-[12px] flex flex-col items-center justify-center gap-3 cursor-pointer hover:border-primary/40 hover:bg-background transition-all duration-300 group">
                                <div class="w-10 h-10 rounded-full bg-gray-100 grid place-items-center mb-1 group-hover:scale-110 transition-transform">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#565D6D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M12 8v8"></path>
                                        <path d="M8 12h8"></path>
                                    </svg>
                                </div>
                                <span class="text-[14px] font-medium text-text-muted text-center leading-tight px-1">Cash on Delivery</span>
                            </div>
                        </div>

                        <div id="payment-forms-container">
                            <!-- Form 1: Credit Card -->
                            <div id="form-credit" class="bg-background border border-text-light rounded-[10px] p-6">
                                <div class="mb-4 relative">
                                    <label for="checkout-card-name" class="block text-[14px] font-medium text-text-main mb-1.5">Name on Card</label>
                                    <input id="checkout-card-name" type="text" class="w-full h-[40px] px-3 border border-text-light rounded-[6px] text-text-muted text-[14px] focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" placeholder="John Doe">
                                </div>
                                <div class="mb-4 relative">
                                    <label for="checkout-card-number" class="block text-[14px] font-medium text-text-main mb-1.5">Card Number</label>
                                    <div class="relative">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#565D6D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-2.5">
                                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                            <line x1="1" y1="10" x2="23" y2="10"></line>
                                        </svg>
                                        <input id="checkout-card-number" type="text" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9 ]/g, '')" maxlength="19" class="w-full h-[40px] pl-10 pr-3 border border-text-light rounded-[6px] text-text-muted text-[14px] focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" placeholder="0000 0000 0000 0000">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="checkout-card-expiry" class="block text-[14px] font-medium text-text-main mb-1.5">Expiry Date</label>
                                        <input id="checkout-card-expiry" type="text" maxlength="5" oninput="this.value = this.value.replace(/[^0-9/]/g, '')" class="w-full h-[40px] px-3 border border-text-light rounded-[6px] text-text-muted text-[14px] focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" placeholder="MM/YY">
                                    </div>
                                    <div>
                                        <label for="checkout-card-cvc" class="block text-[14px] font-medium text-text-main mb-1.5 flex justify-between">
                                            CVC
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#565D6D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                                        </label>
                                        <input id="checkout-card-cvc" type="text" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="4" class="w-full h-[40px] px-3 border border-text-light rounded-[6px] text-text-muted text-[14px] focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" placeholder="123" disabled>
                                    </div>
                                </div>
                            </div>

                            <!-- Form 2: Bank Transfer -->
                            <div id="form-bank" class="bg-background border border-text-light rounded-[10px] p-6 hidden">
                                <h4 class="text-[16px] font-bold text-text-main mb-4">Transfer to our Bank Account</h4>
                                <div class="space-y-2 mb-5">
                                    <div class="flex justify-between border-b border-text-light pb-1.5">
                                        <span class="text-[12px] text-text-muted">Bank Name</span>
                                        <span class="text-[12px] font-bold text-text-main">CIB Bank</span>
                                    </div>
                                    <div class="flex justify-between border-b border-text-light pb-1.5">
                                        <span class="text-[12px] text-text-muted">Account Number</span>
                                        <span class="text-[12px] font-bold text-text-main">100045678901</span>
                                    </div>
                                </div>

                                <div class="space-y-3">
                                    <div>
                                        <label for="checkout-bank-sender" class="block text-[13px] font-medium text-text-main mb-1.5">Sender Name</label>
                                        <input id="checkout-bank-sender" type="text" class="w-full h-[36px] px-3 border border-text-light rounded-[6px] text-[13px]" placeholder="Account Holder Name">
                                    </div>
                                    <div>
                                        <label for="checkout-bank-reference" class="block text-[13px] font-medium text-text-main mb-1.5">Transaction ID / Reference</label>
                                        <input id="checkout-bank-reference" type="text" class="w-full h-[36px] px-3 border border-text-light rounded-[6px] text-[13px]" placeholder="Reference Number">
                                    </div>
                                </div>
                            </div>

                            <div id="form-cod" class="bg-background border border-text-light rounded-[10px] p-6 hidden">
                                <div class="flex items-start gap-4">
                                    <div class="w-10 h-10 rounded-full bg-primary/10 grid place-items-center shrink-0">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E21D2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"></path><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                    </div>
                                    <div>
                                        <h4 class="text-[16px] font-bold text-text-main mb-1">Cash on Delivery</h4>
                                        <p class="text-[13px] text-text-muted leading-relaxed">
                                            Pay in cash to the courier when your order arrives. Please ensure you have the exact amount ready to facilitate a smooth delivery.
                                         </p>
                                    </div>
                                </div>
                                <label class="mt-4 flex items-center gap-2 text-[13px] text-text-main">
                                    <input id="checkout-cod-confirm" type="checkbox" class="accent-primary w-4 h-4">
                                    I confirm I will pay cash upon delivery.
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Order Summary (Fixed Sidebar) -->
            <div class="w-full lg:max-w-[450px] lg:w-[40%] shrink-0">
                <div class="bg-white border border-text-light/50 rounded-[16px] shadow-sm lg:sticky lg:top-[64px] xl:top-[53px]">

                    <!-- Header -->
                    <div class="p-6 bg-white rounded-t-[16px] pb-4 flex items-center gap-3">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E21D2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <h2 class="font-heading font-bold text-[20px] text-text-main">Order Summary</h2>
                    </div>

                    <!-- Items List -->
                    <div class="px-6 py-2 space-y-6" id="checkout-items">
                        <!-- Dynamic items will be injected here -->
                    </div>

                    <!-- Discount Section -->
                    <div class="bg-background/50 border-y border-text-light px-6 py-[17px] mt-[18px]">
                        <div class="flex gap-2 h-[36px]">
                            <label for="checkout-discount-code" class="sr-only">Discount code</label>
                            <input id="checkout-discount-code" type="text" placeholder="Discount code" class="flex-1 border border-text-light rounded-[6px] px-3 focus:outline-none focus:border-text-muted text-[14px] font-sans">
                            <button id="applyDiscountBtn" class="w-[65px] bg-white border border-text-light rounded-[6px] text-text-main font-medium text-[14px] hover:bg-gray-50 transition-colors">Apply</button>
                        </div>
                    </div>

                    <!-- Totals Block -->
                    <div class="p-6 pb-2">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-[14px] text-text-muted" id="checkout-item-count">Subtotal (3 items)</span>
                            <span class="text-[14px] font-medium text-text-main" id="checkout-subtotal">EGP 18,250.00</span>
                        </div>
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-[14px] text-text-muted">Shipping</span>
                            <span class="text-[14px] font-medium text-text-main" id="checkout-shipping-fee">Free</span>
                        </div>
                        <div class="flex justify-between items-center mb-5">
                            <div class="flex items-center gap-1.5">
                                <span class="text-[14px] text-text-muted">Tax (VAT 14%)</span>
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-text-muted"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                            </div>
                            <span class="text-[14px] font-medium text-text-main" id="checkout-tax">EGP 2,555.00</span>
                        </div>
                        <div id="checkout-discount-row" class="flex justify-between items-center mb-5 hidden">
                            <span class="text-[14px] text-text-muted">Discount</span>
                            <span class="text-[14px] font-medium text-[#16A34A]" id="checkout-discount">- EGP 0.00</span>
                        </div>

                        <div class="border-t border-text-light pt-4 pb-5 flex flex-col">
                            <div class="flex justify-between items-start">
                                <div>
                                    <span class="font-bold text-[16px] text-text-main block">Total</span>
                                    <span class="text-[12px] text-text-muted">Including VAT</span>
                                </div>
                                <span class="font-heading text-[24px] text-primary tracking-[-0.6px]" id="checkout-total">EGP 20,955.00</span>
                            </div>
                        </div>

                        <!-- CTA -->
                        <button id="placeOrderBtn" class="w-full h-[56px] text-[14px] bg-primary hover:bg-red-700 text-white font-medium rounded-[6px] transition-colors shadow-sm mb-6 mt-2">
                            {{ $contentBlocks['checkout_place_order']->content ?? 'Place Order' }}
                        </button>

                        <!-- Trust text -->
                        <div class="flex flex-col items-center gap-2 mt-4 pb-2">
                            <div class="flex items-center gap-2 text-[#16A34A] opacity-90">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                    <polyline points="9 12 11 14 15.5 9.5"></polyline>
                                </svg>
                                <span class="text-[12px] text-text-muted">Safe &amp; Secure Payment Processing</span>
                            </div>
                            <p class="text-[12px] text-text-muted text-center leading-[20px] max-w-[370px]">
                                By placing your order, you agree to ATS's <a href="{{ route('terms') }}" class="underline hover:text-text-main">Terms of Service</a> and <a href="{{ route('privacy') }}" class="underline hover:text-text-main">Privacy Policy</a>.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
        <!-- Back Link -->
        <div class="mt-12 flex justify-center w-full">
            <a href="{{ route('catalog') }}" class="flex items-center gap-2 text-[14px] font-medium text-text-muted hover:text-text-main transition-colors">
                <span>&larr;</span> Continue Shopping
            </a>
        </div>
    </main>
@endsection

@section('footer')
    <!-- Minimal Footer (Inherited from task requirement but matching checkout style) -->
    <footer class="bg-gray-light py-8 mt-auto">
        <div class="max-w-[1280px] mx-auto px-6 md:px-10 flex flex-col md:flex-row justify-between items-center gap-4 text-[13px] text-gray-body">
            <p>&copy; 2026 Alex Technology Systems. All rights reserved.</p>
        </div>
    </footer>
@endsection

@push('scripts')
    <!-- Form submission logic will be handled by Blade backend -->
@endpush
