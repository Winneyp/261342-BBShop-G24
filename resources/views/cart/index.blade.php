<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตะกร้าสินค้า</title>
    <style>
        .cart-container { 
          width: 80%; 
          margin: 0 auto; 
          font-family: Arial, sans-serif; 
        }

        /* .cart-container-box {
          position: relative;
          display: flex;
          justify-content: center;
          width: 100%;
        } */

        .cart-container-box {
          position: relative;
          display: flex;
          justify-content: center;
          width: 100%;
          /* background-color: firebrick; */
        }

        .cart-item-container {
          display: relative;
          width: 70%;
          /* background-color: aquamarine; */
        }

        .cart-item { 
          display: flex;
          padding: 15px 0;
          border-bottom: 1px solid #ddd;
        }

        .cart-details { 
          position: relative;
          width: calc(100% - 211px - 24px);
          margin-right: 24px;
        }

        .cart-title { 
          font-weight: bold; 
          font-size: 18px;
          display: flex;
          justify-content: space-between;
        }

        .cart-info { 
          margin: 5px 0; 
        }

        .cart-summary { 
          background-color: #f7f7f7; 
          padding: 15px;
          border: 1px solid #ddd;
          width: 30%;
          height: 250px;
        }

        .total { 
          font-weight: bold; 
          font-size: 18px; 
        }
        
        .checkout-btn { 
          background-color: red; 
          color: #fff; 
          padding: 10px 20px; 
          border: none; 
          cursor: pointer; 
        }

        .select-quantity {
          position: relative;
          margin-top: 4px;
          width: 100px;
          height: 36px;
          border: 0;
          outline: 0;
          font: inherit;
          cursor: pointer;
          border: 1px solid #ddd;
          text-align: center;
        }

        .image-container { 
            position: relative; 
            width: 211px; 
            height: 281px; 
            margin-right: 24px; 
        }

        .cart-detail-content {
          position: relative;
          width: 100%;
          height: 70%;
          /* background-color: rgb(196, 232, 255); */
        }

        .cart-detail-summary {
          position: relative;
          width: 100%;
          display: flex;
          justify-content: space-between;
          height: 25%;
          /* background-color: bisque; */
        }
    </style>
</head>

<body>
    <div class="cart-container">
        <h1>ตะกร้าสินค้า</h1>

        <div class="cart-container-box">
          <div class="cart-item-container">
              @foreach($products as $product)
              <div class="cart-item">
                  <div
                    class="image-container"
                  >
                    <img style="width: 100%; height: 100%;" src="{{ asset('storage/' . $product->picture) }}" alt="{{ $product->description }}">
                  </div>

                  <div class="cart-details">
                    <div class="cart-detail-content">
                      <div class="cart-title">
                        <div>{{ $product->name }}</div>
                        <div>
                          <form action="{{ route('cart.deleteItem') }}" method="DELETE" id="quantity-form-{{ $product->product_id }}" class="quantity-form">
                            @csrf
                            <input type="hidden" name="cart_id" value="{{ $cart->cart_id }}">
                            <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                            <button style="border: none; background-color: transparent; font-size: 18px;" type="submit">x</button>
                          </form>
                        </div>
                      </div>
                      <div class="cart-info">สี: {{ $product->code }}</div>
                      <div class="cart-info">ขนาด: {{ $product->size }}</div>
                      <div class="cart-info">ราคา: THB {{ number_format($product->price, 2) }}</div>
                    </div>

                    <div class="cart-detail-summary">
                      <div class="cart-info-quantity">
                          จำนวน:
                          <br/>
                          <form action="{{ route('cart.updateQuantity') }}" method="PUT" id="quantity-form-{{ $product->product_id }}" class="quantity-form">
                              @csrf
                              <input type="hidden" name="cart_id" value="{{ $cart->cart_id }}">
                              <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                              <select name="quantity" onchange="document.getElementById('quantity-form-{{ $product->product_id }}').submit();">
                                  <option value="1" {{ $product->pivot->amount == 1 ? 'selected' : '' }}>1</option>
                                  <option value="2" {{ $product->pivot->amount == 2 ? 'selected' : '' }}>2</option>
                                  <option value="3" {{ $product->pivot->amount == 3 ? 'selected' : '' }}>3</option>
                                  <option value="4" {{ $product->pivot->amount == 4 ? 'selected' : '' }}>4</option>
                                  <option value="5" {{ $product->pivot->amount == 5 ? 'selected' : '' }}>5</option>
                              </select>
                          </form>
                      </div>

                      <div style="margin-top: 25px;">
                        ยอดรวม: THB {{ number_format($product->price * $product->pivot->amount, 2) }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach

              <div class="cart-summary">
                <form action="{{ route('cart.heckout') }}" method="PUT" id="quantity-form-{{ $product->product_id }}" class="quantity-form">
                  @csrf
                  <input type="hidden" name="products" value="{{ $products }}">
                  <input type="hidden" name="cart_id" value="{{ $cart->cart_id }}">
                  <p>สรุปคำสั่งซื้อ {{ count($cart->amount) }} รายการ</p>
                  <p class="total">ยอดรวม: THB {{ number_format($cart->totalPrice, 2) }}</p>
                  <button class="checkout-btn" type="submit">ชำระเงิน</button>
                </form>
              </div>
            </div>
        </div>
    </div>
</body>
</html>