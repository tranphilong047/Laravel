
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
</div>
<div class="modal-body modal-spa">
    <div class="login-grids">
        <div class="login">
            <div class="login-bottom">
                <h3>Đăng Ký</h3>
                <form action="{{url('/add-customer')}}" method="POST">
                    @csrf
                    <div class="sign-up">
                        <h4>Name :</h4>
                        <input type="text" name="customer_name" placeholder="Họ và tên"/>	
                    </div>
                    <div class="sign-up">
                        <h4>Email :</h4>
                        <input type="text" name="customer_email" placeholder="Email"/>	
                    </div>
                    <div class="sign-up">
                        <h4>Phone :</h4>
                        <input type="text" name="customer_phone" placeholder="Số điện thoại"/>
                    </div>
                    <div class="sign-up">
                        <h4>Password :</h4>
                        <input type="password" name="customer_password" placeholder="Mật khẩu"/>
                        
                    </div>
                    <button type="submit" class="btn btn-default">Đăng Ký</button>
                    
                </form>
            </div>
            <div class="login-right">
                <h3>Đăng Nhập</h3>
                <form action="{{url('/login-customer')}}" method="POST">
                    @csrf
                    <div class="sign-in">
                        <h4>Email :</h4>
                        <input type="text" name="email_account" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">	
                    </div>
                    <div class="sign-in">
                        <h4>Password :</h4>
                        <input type="password" name="password_account" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
                    </div>
                    {{-- captcha --}}
                    <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                    <br/>
                    @if($errors->has('g-recaptcha-response'))
                    <span class="invalid-feedback" style="display:block">
                    </span>
                    @endif
                    @foreach ($errors->all() as $val)
                    <ul>
                        <li>{{$val}}</li>
                    </ul>
                    @endforeach
                    <button type="submit"  class="btn btn-default">Đăng Nhập</button>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
        
    </div>
</div>