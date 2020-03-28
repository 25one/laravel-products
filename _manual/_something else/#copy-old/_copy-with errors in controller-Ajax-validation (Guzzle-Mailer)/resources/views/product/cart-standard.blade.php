                    @foreach($cart as $value)
                                    <!-- Cart Item -->
                                    <li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start" style="width: 50%;">
                                        <div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
                                            <div><a class="btn btn-danger listbuttonremove" id="{{ $value->id }}" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div>
                                            <div><div class="product_image"><img src="{{ $value->image }}" alt=""></div></div>
                                            <div class="product_name_container">
                                                <div class="product_name"><a href="#">{{ $value->name }}</a></div>
                                                <div class="product_text">Second line for additional info</div>
                                            </div>
                                        </div>
                                        <div class="product_price product_text">{{ $value->price }}</div>
                                    </li>
                                    <hr>
                                   <!-- Cart Item -->
                    @endforeach
