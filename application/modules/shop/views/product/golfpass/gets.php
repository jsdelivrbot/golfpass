        <link rel="canonical" href="https://www.mrandmrssmith.com/hotel-search" />
        <link rel="next" href="https://www.mrandmrssmith.com/hotel-search?page=2" />
        <link rel="preload" href="/public/etc/hotel/bundles/familysystem/fonts/proximanova-regular-webfont.woff2" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="/public/etc/hotel/bundles/familysystem/fonts/proximanova-semibold-webfont.woff2" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="/public/etc/hotel/bundles/familysystem/fonts/proximanova-light-webfont.woff2" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="/public/etc/hotel/bundles/familysystem/fonts/proximanova-lightit-webfont.woff2" as="font" type="font/woff2" crossorigin>
        <link rel="stylesheet" type="text/css" href="/public/etc/hotel/css/SearchBundle/css.css" />
        <link rel="stylesheet" type="text/css" href="/public/etc/hotel/css/SystemBundle/css.css" />
        <link rel="dns-prefetch" href="https://cdn.polyfill.io">
        <link rel="dns-prefetch" href="https://code.jquery.com">

        <noscript>
            <style type="text/css">
                #s_query, #s > div:nth-child(2), #s > div:nth-child(3) {
                    visibility: visible;
                }
            </style>
        </noscript>

        <script type="text/javascript">
            document.documentElement.className = document.documentElement.className.replace("no-js","js");
            dataLayer = [];
            dataLayer.push({'users_current_region' : 'ASIAPAC'});
            dataLayer.push({'current_region' : 'ASIAPAC'});
            SP = {
                env : {
                    payload          : 'https://smithcollections.com/member-json',
                    member_homepage  : 'https://smithcollections.com/members',
                    assets_version   : 'v6b09cfdb4e5',
                    date_format      : 'dd-mm-yyyy',
                    telephone_number : '+61 3 8648 8871',
                    site_inc_tax     : '',
                    locale           : 'ASIAPAC'
                    ,
                    l                : true
                }
            };

            dataLayer.push({
            pageDetails: {
                uri: '/hotel-search'
                    ,search: {
                        sortOrder: 'desc',
                        startDate: null,
                        endDate:   null,
                        numberOfNights: 0
                    }
                }
            });

            dataLayer.push({
                user : {
                    name: false,
                    sex: false,
                    age: 'Not specfied by user',
                    loyaltyAmount: false,
                    memberTier: false,
                    membershipLevel: false,
                    loggedIn: false,
                    firstname: false,
                    lastname: false,
                    reference: false,
                    ipAddress: "211.107.64.99"
                },
                env: {
                    envName: 'prod'
                }
            });
        </script>
        <!-- Maxymiser script start -->
        <script type="text/javascript" src="/public/etc/hotel/api/eu/mrandmrssmith.com/f8410e/mmapi.js"></script>
        <!-- Maxymiser script end -->
    <!-- </head> -->
    <!-- <body> -->
        <!-- Google Tag Manager -->
        <noscript>
            <iframe src="//www.googletagmanager.com/ns.html?id=GTM-WR4HD5" height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
        <script>
            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer', 'GTM-WR4HD5');
        </script>
        <!-- End Google Tag Manager -->
        <div style="margin-top:60px;"></div>
        <div id="main-section">
            <main role="main" class="global">
                <div id="searchResultsBar">
                <input type="hidden" value="SGD" id="pageCurrency">
                    <div id="section">
                        <section class="list_row">
                            <h1 class="generic-content page-title"><?=$category->name?></h1>
                            <div class="M-12_12 L-12_12 XL-12_12 XXL-12_12">
                                <div class="content-block-inner" id="search-suggestedtags"></div>
                            </div>
                            <div id="suggestedBuckets"></div>
                            <div data-id="detail" id="hotel-results">
                                <div>
                                    <article id="enlarge" aria-hidden="true" class="mfp-hide">
                                        <div class="map-area generic-content-textblock L-10_12 XL-10_13 XXL-10_13" id="gmaps"></div>
                                        <script type="text/javascript">
                                            var mapParams = mapParams || {};
                                            mapParams.villas = false;
                                            mapParams.small = false;
                                            mapParams.single = false;
                                            mapParams.small = false;
                                            mapParams.draggable = 'draggable';
                                            mapParams.tags = new Array();
                                            mapParams.zoom = 2;
                                            mapParams.lat = 0;
                                            mapParams.lng = 0;
                                            mapParams.icons = {
                                                'darkred': {
                                                'imgSingle' :  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/4da48f0.png' ,
                                                'imgSmall' :  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/94ed393.png' ,
                                                'imgMedium' :  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/5df9fc6.png' ,
                                                'imgLarge' :  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/f7eeb40.png'         },
                                                'red': {
                                                'imgSingle' :  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/f5b73ab.png' ,
                                                'imgSmall' :  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/e7996cf.png' ,
                                                'imgMedium' :  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/4fa41b6.png' ,
                                                'imgLarge' :  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/b033e32.png'         },
                                                'villa': {
                                                'imgSingle':  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/b009773.png' ,
                                                'imgSmall' :  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/94ed393.png' ,
                                                'imgMedium' :  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/5df9fc6.png' ,
                                                'imgLarge' :  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/f7eeb40.png'         },
                                                'villared': {
                                                'imgSingle':  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/9e22b62.png' ,
                                                'imgSmall' :  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/e7996cf.png' ,
                                                'imgMedium' :  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/4fa41b6.png' ,
                                                'imgLarge' :  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/b033e32.png'         },
                                                'hotelUnavailable': {
                                                'imgSingle':  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/0bcce81.png' ,
                                                'imgSmall' :  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/94ed393.png' ,
                                                'imgMedium' :  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/5df9fc6.png' ,
                                                'imgLarge' :  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/f7eeb40.png'         },
                                                'villaUnavailable': {
                                                'imgSingle':  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/026055f.png' ,
                                                'imgSmall' :  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/94ed393.png' ,
                                                'imgMedium' :  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/5df9fc6.png' ,
                                                'imgLarge' :  'https://www.mrandmrssmith.com/v6b09cfdb4e5/images/f7eeb40.png'         }
                                            };
                                        </script>
                                    </article>
                                </div>
                                <ol id="search-list">
                                    <?php for($i=0; $i< count($products); $i++){?>
                                    <li class="result S-4_4 M-12_12 L-12_12 XL-12_13 XXL-12_13 ">
                                        <a id="hotelcard-5638" class="hotelcard-anchor"></a>
                                        <article class="hotelcard">
                                            <header>
                                                <div class="hotelcard-imgblock M-6_12 L-6_12 XL-6_12 XXL-6_12">
                                                    <div class="carousel-search">
                                                        <?php 
                                                        
                                                        for($j=0 ; $j< count($products[$i]->photos); $j++){?>
                                                        <a href="<?=site_url(shop_product_uri."/get/{$products[$i]->id}")?>">
                                                            <div class="position-relative rounded-top" style="background-image:url(<?=$products[$i]->photos[$j]?>); background-repeat:no-repeat; background-position:center; background-size:cover">
                                                            <img src="/public/images/blank2.png" alt=""/>
                                                            </div>
                                                    <?php }?>
                                                    </div>
                                                    <div class="hotelcard-details-utilities">
                                                        <ul class="hotelcard-details-utilities-list clearfix">
                                                            <li class="hotelcard-details-utilities-mapsbutton">
                                                                <a class="hotelcard-details-utilities-mapsicon clickMap" href="#enlarge" data-lat="41.9328" data-long="12.1045" data-id="3083" data-name="La Posta Vecchia" data-prop="hotel"></a>
                                                            </li>
                                                            <li class="hotelminicard-details-utilities-wishlistbutton wishlist-btn" data-trigger="wishlist" data-hotel="5638">
                                                                <p class="header-title-hotelwishlist" data-hotel="5638" data-property="hotel" data-login-url="/login" data-wishlist-url="https://smithcollections.com/wish-list">
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="hotelcard-link M-6_12 L-6_12 XL-6_12 XXL-6_12">
                                                    <div class="hotelcard-title">
                                                        <div class="hotelcard-title-container">
                                                            <p class="hotelcard-title-destination">
                                                                <span class="location" data-tags="Rome"><?=$products[$i]->eng_name?></span>
                                                            </p>
                                                            <a href="<?=site_url(shop_product_uri."/get/{$products[$i]->id}")?>"><h2 class="hotelcard-title-hotelname"><?=$products[$i]->name?></h2></a>
                                                        </div>
                                                        <div class="hotelcard-details-pricing">
                                                            <p class="clearfix">
                                                                <span class="hotelcard-details-pricing-frontlabel"></span>
                                                                <span>
                                                                    <span class="hotelcard-details-pricing-label">1인 1박 기준</span>
                                                                </span>
                                                                <span class="hotelcard-details-pricing-rate">
                                                                    <span class="currency-to-convert price currency-show-ex" data-rate-inc="11000" data-rate-ex="10000" data-rate-currency="EUR"><?=$products[$i]->price?>원</span>
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <article id="modal-averageprice-la-posta-vecchia" class="mfp-hide white-popup-block">
                                                    <span class="mfp-close modal-dismiss"></span>
                                                    <header class="smith-ui-popup-title">
                                                        <h3>Price information</h3>
                                                    </header>
                                                    <div class="smith-ui-popup-body">
                                                        <div class="smith-ui-popup-content">
                                                            <p>If you haven&rsquo;t entered any dates, the rate shown is provided directly by the hotel and represents the cheapest double room (including tax) available in the next 21&nbsp;days.</p>
                                                            <p>Prices have been converted from the hotel&rsquo;s local currency (EUR11,000.00), via openexchangerates.org, using today&rsquo;s exchange rate.</p>
                                                        </div>
                                                    </div>
                                                </article>
                                                <article id="info-modal-info-5638" class="mfp-hide white-popup-block">
                                                    <span class="mfp-close modal-dismiss"></span>
                                                    <header class="smith-ui-popup-title">
                                                        <h3>Why book with us?</h3>
                                                    </header>
                                                    <div class="smith-ui-popup-body">
                                                        <div class="smith-ui-popup-content">
                                                            <div>
                                                                <h4><strong>Best-price guarantee</strong></h4>
                                                                <p>Found your stay for less elsewhere? <a href="https://www.mrandmrssmith.com/price-match" target="_blank">We&#39;ll match the price and give you a &pound;50 voucher.</a></p>
                                                                <h4><strong>Free Smith Extras on arrival</strong></h4>
                                                                <p>From a bottle of champagne, to a spa treatment or a cookery class, you&rsquo;ll get a little extra thank you with every booking</p>
                                                                <h4><strong>Here for you 24/7</strong></h4>
                                                                <p>Personal service from Smith24, our in-house travel specialists, <a class="InfinityNumber" href="tel:+61 3 8648 8871">+61 3 8648 8871</a></p>
                                                                <h4><strong>Anonymously reviewed</strong></h4>
                                                                <p>Every hotel is reviewed by undercover tastemakers (and their partners)</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </header>
                                            <div class="hotelcard-maintext M-6_12 L-6_12 XL-6_12 XXL-6_12">
                                                <h3>위치&nbsp;</h3>
                                                <p class="hotelcard-maintext-style">
                                                    <?php for($j=count($parent_categories)-2; $j >= 0; $j--){?>
                                                        <?=$parent_categories[$j]->name?>&nbsp
                                                <?php }?></p>
                                                <h3>형태&nbsp;</h3>
                                                <p class="hotelcard-maintext-setting"><?=$products[$i]->hotel_id !== null ? "골프장+호텔" : "골프장"?></p>
                                                <h3 class="hotelcard-maintext-smithextralabel">소개&nbsp;</h3>
                                                <div class="hotelcard-smithextracntnt">
                                                <?=$products[$i]->desc?>
                                                    <a href="<?=site_url(shop_product_uri."/get/{$products[$i]->id}")?>" class="more-smith-extra mock-link tc-modal" data-hotelname="la-posta-vecchia">&#x203a; More</a> 
                                                    <article aria-hidden="true" id="modal-smith-extra-5638" class="mfp-hide white-popup-block">
                                                        <span class="mfp-close modal-dismiss"></span>
                                                        <header class="smith-ui-popup-title">
                                                            <h3>Smith Extra</h3>
                                                        </header>
                                                        <div class="smith-ui-popup-body">
                                                            <div class="smith-ui-popup-content">
                                                                A £50 credit to spend at the hotel’s impressive restaurant with most stays; exclusive use stays will instead get use of the roman steam bath, tennis court, and six bikes, along with a welcome bottle of prosecco and fresh fruit in each room
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                            <div class="hotelcard-bttns S-4_4 M-12_12 L-12_12 XL-12_12 XXL-12_12">
                                                <div class="hotelcard-bttns-wrapper hotelcard-quickview S-4_4 M-6_12 L-6_12 XL-6_12 XXL-6_12">
                                                    <a class="hotelcard-bttns-rates" href="<?=site_url(shop_product_uri."/get/{$products[$i]->id}")?>" data-slug="la-posta-vecchia">상품 보기</a>
                                                    <p onclick="ajax_a(this); return false;" data-action="<?=site_url(shop_wishlist_uri."/ajax_add/{$products[$i]->id}")?>" class='hotelcard-bttns-highlights'>위시리스트에 추가</p>
                                                </div>

                                                <div class="hotelcard-bookandrates open"></div>
                                            </div>
                                        </article>
                                    </li>
                                    <?php }?>
                                </ol>
                                <?php echo $this->pagination->create_links(); ?>        
                                <!-- <ol id="hotel-results-pagination" class="hotel-results-pagination">
                                    <li class="selected"><a href="/hotel-search?page=1" rel="next">1</a></li>
                                    <li class=""><a href="/hotel-search?page=2" rel="next">2</a></li>
                                    <li class=""><a href="/hotel-search?page=3" rel="next">3</a></li>
                                    <li class=""><a href="/hotel-search?page=4" rel="next">4</a></li>
                                    <li class="hellip">&hellip;</li>
                                    <li><a href="/hotel-search?page=110" rel="next">110</a></li>
                                    <li id="hotel-results-pagination-next"><a href="/hotel-search?page=2" rel="next"></a></li>
                                </ol> -->
                            </div>
                        </section>
                    </div>
                    <script type='text/javascript'>
                        if ( !window.dataLayer || !Array.isArray(window.dataLayer)) {
                            window.dataLayer = new Array();
                        }
                        window.dataLayer.push( {'supplier_ids': '3083,3371,2968,1464,595,3382,3070,1889,359,3397'});
                    </script>
                    <script type='text/javascript'>
                        /**
                        * Call this function when a user navigates to get a room page
                        * add all products on page to google analytics view
                        */
                        window.dataLayer.push({
                        'ecommerce': {
                            'currencyCode': 'GBP', // Local currency is optional.
                            'impressions': [
                                {
                                    'name': 'La Posta Vecchia',
                                    'id': '3083',
                                    'brand': 'Smith Hotels',
                                    'price': '9798.94',
                                    'category': 'hotel',
                                    'variant': '',
                                    'list': 'Search Results',
                                    'position': 1
                                }
                                ,        				{
                                    'name': 'Soneva Jani',
                                    'id': '3371',
                                    'brand': 'Smith Hotels',
                                    'price': '2908.90',
                                    'category': 'hotel',
                                    'variant': '',
                                    'list': 'Search Results',
                                    'position': 2
                                }
                                ,        				{
                                    'name': 'Awasi Patagonia',
                                    'id': '2968',
                                    'brand': 'Smith Hotels',
                                    'price': '1821.77',
                                    'category': 'hotel',
                                    'variant': '',
                                    'list': 'Search Results',
                                    'position': 3
                                }
                                ,        				{
                                    'name': 'Dolphin Island',
                                    'id': '1464',
                                    'brand': 'Smith Hotels',
                                    'price': '2109.88',
                                    'category': 'hotel',
                                    'variant': '',
                                    'list': 'Search Results',
                                    'position': 4
                                }
                                ,        				{
                                    'name': 'La Réserve Paris Apartments',
                                    'id': '595',
                                    'brand': 'Smith Hotels',
                                    'price': '1692.54',
                                    'category': 'hotel',
                                    'variant': '',
                                    'list': 'Search Results',
                                    'position': 5
                                }
                                ,        				{
                                    'name': 'Kokomo Private Island Fiji',
                                    'id': '3382',
                                    'brand': 'Smith Hotels',
                                    'price': '1892.93',
                                    'category': 'hotel',
                                    'variant': '',
                                    'list': 'Search Results',
                                    'position': 6
                                }
                                ,        				{
                                    'name': 'Shakti 360° Leti',
                                    'id': '3070',
                                    'brand': 'Smith Hotels',
                                    'price': '1518.14',
                                    'category': 'hotel',
                                    'variant': '',
                                    'list': 'Search Results',
                                    'position': 7
                                }
                                ,        				{
                                    'name': 'One&amp;Only Reethi Rah',
                                    'id': '1889',
                                    'brand': 'Smith Hotels',
                                    'price': '1776.83',
                                    'category': 'hotel',
                                    'variant': '',
                                    'list': 'Search Results',
                                    'position': 8
                                }
                                ,        				{
                                    'name': 'Cayo Espanto',
                                    'id': '359',
                                    'brand': 'Smith Hotels',
                                    'price': '1783.66',
                                    'category': 'hotel',
                                    'variant': '',
                                    'list': 'Search Results',
                                    'position': 9
                                }
                                ,        				{
                                    'name': 'Awasi Atacama',
                                    'id': '3397',
                                    'brand': 'Smith Hotels',
                                    'price': '1413.55',
                                    'category': 'hotel',
                                    'variant': '',
                                    'list': 'Search Results',
                                    'position': 10
                                }
                            ]
                        }
                        });
                    </script>
                </div>
            </main>
        </div>
        <script src='/public/etc/hotel/jquery-2.2.4.min.js' defer></script>
        <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/react/15.1.0/react.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/react/15.1.0/react-dom.js'></script> -->
        <script src="/public/etc/hotel/v2/polyfill.js" defer></script>
        <script src="/public/etc/hotel/js/5bbac5b4.36.vendor.js" defer></script>
        <script src="/public/etc/hotel/js/75ef551b.10.common.js" defer></script>
        <script type="text/javascript" src="/public/etc/hotel/js/4083ea42.20.hotelsearch.js" defer></script>
        
    <!-- </body> -->
<!-- </html> -->

