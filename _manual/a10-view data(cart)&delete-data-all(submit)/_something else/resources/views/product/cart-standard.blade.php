                    @foreach($cart as $cartvalue)
                                    <!-- Cart Item -->
                                    <li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start" style="width: 50%;">
                                        <div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
                                            <div><div class="product_image"><img src="{{ $cartvalue->image }}" alt=""></div></div>
                                            <div class="product_name_container">
                                                <div class="product_name"><a href="#">{{ $cartvalue->name }}</a></div>
                                                <div class="product_text">Second line for additional info</div>
                                            </div>
                                        </div>
                                        <div class="product_price product_text">{{ $cartvalue->price }}</div>
                                    </li>
                                    <hr>
                                   <!-- Cart Item -->
                    @endforeach