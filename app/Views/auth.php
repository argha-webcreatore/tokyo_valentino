<!DOCTYPE html>
     <html lang="en" dir="ltr">
        <head>
           <meta charset="utf-8">
           <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
           <title>Login and Registration</title>
           <link rel="stylesheet" href="assets/css/auth.css">
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body>
     <div class="container" id="container">
         <div class="form-container sign-up-container">
             <form action="#" method="post" accept-charset="utf-8">
             <input type="hidden" name="project_csrf" value="" />
      
                 <h1>Create Account</h1>
                 <input type="text" placeholder="Name" name="name"/>
                 <input type="email" placeholder="Email" name="email"/>
                 <input type="number" placeholder="Phone (+91)" name="contact_number"/>
                 <input type="password" placeholder="Password" name="password"/>
                 <input type="password" placeholder="Confirm password" name="confirm_password"/>
                 <div class="submit_button_container">
                     <button type="button" class="submitBtn">Sign Up</button>
                 </div>
             </form>	</div>
         <div class="form-container sign-in-container">
             <form action="#" method="post" accept-charset="utf-8">
                 <input type="hidden" name="project_csrf" value="" />
      
                 <h1>Sign in</h1>
                 <input type="email" placeholder="Email" name="email"/>
                 <input type="password" placeholder="Password" name="password"/>
                 <a href="#">Forgot your password?</a>
                 <div class="submit_button_container">
                     <button type="button" class="submitBtn">Sign In</button>
                 </div>
             </form>	</div>
         <div class="overlay-container">
             <div class="overlay">
                 <div class="overlay-panel overlay-left">
                     <h1>Welcome Back!</h1>
                     <p>To keep connected with us please login with your personal info</p>
                     <button class="ghost" id="signIn">Sign In</button>
                 </div>
                 <div class="overlay-panel overlay-right">
                     <h1>Hello, Friend!</h1>
                     <p>Enter your personal details and start journey with us</p>
                     <button class="ghost" id="signUp">Sign Up</button>
                 </div>
             </div>
         </div>
     </div>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script>
         const signUpButton = document.getElementById('signUp');
         const signInButton = document.getElementById('signIn');
         const container = document.getElementById('container');
     
         signUpButton.addEventListener('click', () => {
             $('.error_message').each(function(){
                 this.remove();
             })
             container.classList.add("right-panel-active");
         });
     
         signInButton.addEventListener('click', () => {
             $('.error_message').each(function(){
                 this.remove();
             })
             container.classList.remove("right-panel-active");
         });
     
         $('.submitBtn').click(function(e){
             e.preventDefault();
             var seriaLiseData = $(this).parents('form').serialize();
             var _action = $(this).parents('form').attr('action');
             var _method = $(this).parents('form').attr('method');
             var form = $(this).parents('form');
             $.ajax({
                 url : _action,
                 type : _method,
                 data : seriaLiseData,
                 success : function(data)
                 {
                     var jsondata = JSON.parse(data);
                     var index = 0;
                     $('.error_message').each(function(){
                         this.remove();
                     })
     
                     if(isEmpty(jsondata.error))
                     {
                         location.href = jsondata.redirect_uri;
                     }
                     else
                     {
                         Object.entries(jsondata.error).forEach(([key, val]) => {
                             if(index == 0)
                             {
                                 $(`input[name="${key}"]`).trigger('focus');
                             }
                             $(`<span style="text-align:left;" class="error_message">${val}</span>`).insertAfter(`input[name="${key}"]`);
                             index++;
                         });
                     }
                     
                 }
             })
         })
     
         function isEmpty(obj) {
             return Object.keys(obj).length === 0;
         }
     </script>
        </body>
     </html>