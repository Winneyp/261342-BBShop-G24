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

        .cart-info-quantity {
          /* margin-top: 90px; */
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
              <!-- @foreach($items as $item) -->
              <div class="cart-item">
                <div
                  class="image-container"
                >
                  <!-- <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}"> -->
                  <img style="width: 100%; height: 100%;" src="../../public/images/fighter.jpg" alt="{{ $item['name'] }}">
                </div>

                <div class="cart-details">
                  <div class="cart-detail-content">
                    <!-- <div class="cart-title">{{ $item['name'] }}</div> -->
                    <div class="cart-title">
                      <div>เสื้อฮู้ด ผ้าสเวต แขนยาว แบบสวมหัว</div>
                      <div>x</div>
                    </div>
                    <!-- <div class="cart-info">สี: {{ $item['code'] }}</div> -->
                    <div class="cart-info">สี: RED</div>
                    <!-- <div class="cart-info">ขนาด: {{ $item['size'] }}</div> -->
                    <div class="cart-info">ขนาด: XL</div>
                    <!-- <div class="cart-info">ราคา: THB {{ number_format($item['price'], 2) }}</div> -->
                    <div class="cart-info">ราคา: THB 1,290.00</div>
                  </div>

                  <div class="cart-detail-summary">
                    <div class="cart-info-quantity">
                        จำนวน:
                        <br/>
                        <select class="select-quantity" name="quantity" id="quantity_{{ $loop->index }}">
                            <option value="1" {{ $item['quantity'] == 1 ? 'selected' : '' }}>1</option>
                            <option value="2" {{ $item['quantity'] == 2 ? 'selected' : '' }}>2</option>
                            <option value="3" {{ $item['quantity'] == 3 ? 'selected' : '' }}>3</option>
                        </select>
                    </div>

                    <!-- <div>
                        ยอดรวม: THB {{ number_format($item['price'] * $item['quantity'], 2) }}
                    </div> -->
                    <div style="margin-top: 25px;">
                        ยอดรวม: THB 1,920.00
                    </div>
                  </div>
                </div>
              </div>

              <div class="cart-item">
                  <div
                    class="image-container"
                  >
                    <!-- <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}"> -->
                    <img style="width: 100%; height: 100%;" src="../../public/images/fighter.jpg" alt="{{ $item['name'] }}">
                  </div>

                  <div class="cart-details">
                    <div class="cart-detail-content">
                      <!-- <div class="cart-title">{{ $item['name'] }}</div> -->
                      <div class="cart-title">เสื้อฮู้ด ผ้าสเวต แขนยาว แบบสวมหัว</div>
                      <!-- <div class="cart-info">สี: {{ $item['code'] }}</div> -->
                      <div class="cart-info">สี: RED</div>
                      <!-- <div class="cart-info">ขนาด: {{ $item['size'] }}</div> -->
                      <div class="cart-info">ขนาด: XL</div>
                      <!-- <div class="cart-info">ราคา: THB {{ number_format($item['price'], 2) }}</div> -->
                      <div class="cart-info">ราคา: THB 1,290.00</div>
                    </div>

                    <div class="cart-detail-summary">
                      <div class="cart-info-quantity">
                          จำนวน:
                          <br/>
                          <select class="select-quantity" name="quantity" id="quantity_{{ $loop->index }}">
                              <option value="1" {{ $item['quantity'] == 1 ? 'selected' : '' }}>1</option>
                              <option value="2" {{ $item['quantity'] == 2 ? 'selected' : '' }}>2</option>
                              <option value="3" {{ $item['quantity'] == 3 ? 'selected' : '' }}>3</option>
                          </select>
                      </div>

                      <!-- <div>
                          ยอดรวม: THB {{ number_format($item['price'] * $item['quantity'], 2) }}
                      </div> -->
                      <div style="margin-top: 25px;">
                          ยอดรวม: THB 1,920.00
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- @endforeach -->

              <div class="cart-summary">
                <p>สรุปคำสั่งซื้อ 2 รายการ</p>
                <p class="total">ยอดรวม: THB 2,580.00</p>
                <button class="checkout-btn">ชำระเงิน</button>
              </div>
            </div>
        </div>
    </div>
</body>
</html>