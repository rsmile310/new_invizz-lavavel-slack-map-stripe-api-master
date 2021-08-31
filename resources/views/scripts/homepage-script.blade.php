<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
<script src="https://js.stripe.com/v3/"></script>
<script>
    $(document).ready(function() {
        // Create an instance of the Stripe object
        // Set your publishable API key
        var stripe = Stripe("{{ env('STRIPE_PUBLISH_KEY') }}");

        var elements = stripe.elements();

        var style = {
        base: {
            color: "#32325d",
            fontFamily: 'Arial, sans-serif',
            fontSmoothing: "antialiased",
            fontSize: "16px",
            "::placeholder": {
            color: "#32325d"
            }
        },
        invalid: {
            fontFamily: 'Arial, sans-serif',
            color: "#fa755a",
            iconColor: "#fa755a"
        }
        };

        var card = elements.create("card", { style: style });
        // Stripe injects an iframe into the DOM
        card.mount("#card-element");

        card.on("change", function (event) {
        // Disable the Pay button if there are no card details in the Element
        // document.querySelector("button").disabled = event.empty;
        document.querySelector("#card-error").textContent = event.error ? event.error.message : "";
        });


        // Get payment form element
        var form = document.getElementById('payment-form');

        // Create a token when the form is submitted.
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            createToken();
        });

        // Create single-use token to charge the user
        function createToken() {
            stripe.createToken(card).then(function (result) {
                if (result.error) {
                    // Inform the user if there was an error
                    resultContainer.innerHTML = '<p>' + result.error.message + '</p>';
                } else {
                    // Send the token to your server
                    stripeTokenHandler(result.token);
                }
            });
        }

        // Callback to handle the response from stripe
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
        
        $("#btn_register").click(function(){
            

            if($("#email").val()==""){
                $("#email-error").html('The terms conditions must be accepted.');
                return false;
            }else{
                $("#email-error").html('');
            }

            if(!$('#terms_conditions').prop('checked')){
                $("#terms-error").html('The terms conditions must be accepted.');
                return false;
            }else{
                $("#terms-error").html('');
            }
        })

        $("#payment-form").on('submit', function() {
            console.log("This")
        })

        console.log($("#registered").val())

        if($("#registered").val() == "uncompleted"){

            setTimeout(function() {
                cuteAlert({
                    type: "question",
                    title: "INVIZZ",
                    message: "You should complete your profile to promote yourself, Would you complete your profile?",
                    confirmText: "Yes",
                    cancelText: "No, Thanks."
                }).then((e)=>{
                    console.log(e)
                    if (e == ("confirm")){
                        @guest
                        @else
                        location.href="/profile/{{Auth::user()->id}}"
                        @endguest
                    }else{
                        
                    }
                })         
            }, 3000);
            
        } 

        $("#join_invizz_register").click(function(){
            $("#email").val($("#email_register").val())
            console.log($("#email_register").val())
        })

        $("#btn_login").click(function() {

            var email = $("#emails").val()
            var password = $("#password").val()
            console.log(email, password)

            if(email == ""){
                tata.info('INVIZZ', "Input failed!")
            }else{
                $.ajax({
                    url: "{{ route('login') }}",
                    type: 'POST',
                    data: {'_token': '{{ csrf_token() }}', 'email':email, 'password':password, 'remember':'on'},
                    success: function(result) {

                        setTimeout(function() {
                            location.reload()
                        }, 1500);
                        
                        tata.success('INVIZZ', "Login Success!")
                    },
                    error: function() {
                        tata.error('INVIZZ', "Login Failed!")
                    }

                })
            }
           
        })

        $("#send_message").click(function(){
            var name_contact = $("#name_contact").val()
            var email_contact = $("#email_contact").val()
            var subject_contact = $("#subject_contact").val()
            var message_contact = $("#message_contact").val()

            console.log(name_contact,email_contact,subject_contact,message_contact)
            $.ajax({
                url: "{{ route('email.feedback') }}",
                type: 'POST',
                data: { '_token': '{{ csrf_token() }}', 'name_contact': name_contact, 'email_contact': email_contact, 'subject_contact': subject_contact, 'message_contact': message_contact },
                dataType: 'json',
                success: function(msg) {
                    console.log(msg)
                },
                error: function() {
                    console.log('error');
                    tata.success('INVIZZ', "Your feedback is sent successfully")
                }
            })
        })
    })
</script>
