<div class="container1">
    <div class="main">

            <div class="sign-up-content">
                <span class="logo"><a href="/">Unity<b>Events</b></a></span>
                <h2 style="text-size: 100px; text-color:#ffffff">Signup</h2>
                <br>

                    <h6 style="font-size: 20px; text-color:#202020">What type of user are you ?</h6>
                    <div class="form-radio">
                        <input type="radio" name="member_level" value="0" id="newbie" checked="checked" />
                        <label for="newbie" style="width: 192px;">Participant</label>

                        <input type="radio" name="member_level" value="1" id="average" />
                        <label for="average" style="width: 192px;">Host</label>
                    </div>
                    <div class="form-textbox">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="nameId" required/>
                    </div>
                    <div class="form-textbox">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="emailId" required/>
                    </div>
                    <div class="form-textbox">
                        <label for="email">Mobile Number</label>
                        <input type="number" name="mobilenumber" id="mobileNoId" required/>
                    </div>
                    <div class="form-textbox">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="addressId" required/>
                    </div>
                    <div class="form-textbox">
                        <label for="pass">Password</label>
                        <input type="password" name="pass" id="passId" required/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" checked/>
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                    </div>
                    <div class="form-textbox">
                        <!--<input type="submit" name="submit" id="submitId" class="submit" value="Create Account" />-->
                       <center> <button id="submitId" type="submit" class="submit" style="width: 400px">Create Account</button></center>
                    </div>

                <p class="loginhere">
                    Already have an account ?<a href="{{'/login'}}" class="loginhere-link"> Sign in Here</a>
                </p>
            </div>
        </div>
    </div>

    </div>
