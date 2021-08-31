<script>
    $(document).ready(function() {
        
        $("#file_upload").change(function() {
            $("#upload_avatar").submit()
        })

        $("#send_mail").click(function(){
            console.log(document.getElementById('send_mail').checked ? 'on':'off')
        })

        $("#artist_type").change(function(){
            if($(this).val()=="other"){
                $("#addtype").prop( "disabled", false );
                $("#btn_add_type").prop( "disabled", false );
            }else{
                $("#addtype").prop( "disabled", true );
                $("#btn_add_type").prop( "disabled", true );
            }
        })

        $("#btn_add_type").click(function(){
            var addtype = $("#addtype").val()
            console.log(addtype)
            $.ajax({
                url: "{{ route('profile.addtype') }}",
                type: 'POST',
                data: {'_token': '{{ csrf_token() }}', 'addtype': addtype},
                dataType:'json',
                success: function(result) {
                    console.log('result')
                    tata.success('INVIZZ', "Add artist type Success!")
                },
                error: function() {
                    console.log('error');
                    tata.error('INVIZZ', "Add artist type Failed!")
                }
            }) 
        })

        $("#save_profile").click(function() {
            var firstname = $("#firstname").val()
            var lastname = $("#lastname").val()
            var bio = $("#bio").val()
            var address = $("#address").val()
            var zipcode = $("#zipcode").val()
            var dob = $("#dob").val()
            var artist_type = $("#artist_type").val()
            var send_mail = document.getElementById('send_mail').checked ? 'on':'off'
            var hide_age = document.getElementById('hide_age').checked ? 'on':'off'
            var collab_status = document.getElementById('collab_status').checked ? 'on':'off'
            var slack_url = $("#slack_url").val()
            var social_fb = $("#social-fb").val()
            var social_tw = $("#social-tw").val()
            var social_insta = $("#social-insta").val()
            var social_lin = $("#social-lin").val()

            console.log(firstname, lastname, bio, address, zipcode, dob, artist_type, send_mail, hide_age, collab_status, social_fb, social_tw, social_insta, social_lin)
            console.log( $("#cover_image_croped").attr('src'))

            var img_src_check = $("#cover_image_croped").attr('src')
            console.log(img_src_check.indexOf("assets/img/artists/avatar.jpg"))
            if($("#artist_type").val()==1 || img_src_check.indexOf("assets/img/artists/avatar.jpg")>1 || firstname == "" || lastname == "") tata.error('INVIZZ', "Complete your profile, please check again")
            else
            $.ajax({
                url: "{{ route('profile.update',$profile->user_id) }}",
                type: 'PUT',
                data: {'_token': '{{ csrf_token() }}', 'firstname': firstname, 'lastname': lastname, 'bio': bio, 'address': address, 'zipcode': zipcode, 'dob': dob, 'artist_type': artist_type, 'send_mail': send_mail, 'hide_age': hide_age, 'collab_status': collab_status, 'slack_url': slack_url, 'social_fb': social_fb, 'social_tw': social_tw, 'social_insta': social_insta, 'social_lin': social_lin, 'profile_complete': 'on'},
                dataType:'json',
                success: function(user_info) {
                    console.log('user_info')
                    tata.success('INVIZZ', "Update information Success!")
                },
                error: function() {
                    console.log('error');
                    tata.error('INVIZZ', "Update information Failed!")
                }
            }) 
        })

        $("#deactive_account").click(function(){
            var date = new Date()
            var months = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]
            var created_at = "{{ Auth::user()->created_at }}"
            var user_id = "{{ Auth::user()->id }}"
            created_at = created_at.split(" ")
            created_date = created_at[0]
            var current_date = date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate()
            // var current_date = "2021-06-05"
            // created_date = "2021-06-03"
            
            created_date = created_date.split("-")
            current_date = current_date.split("-")
            var day = 0
            if(Number(created_date[0]) < Number(current_date[0])){
                day = 10
            }else{
                if(Number(created_date[1]) < (Number(current_date[1])-1)){
                    day = 10
                }
                else if(Number(created_date[1]) == (Number(current_date[1])-1)){
                    day = Number(current_date[2]) + months[Number(created_date[1])-1] - Number(created_date[2])
                }else{
                    day = Number(current_date[2]) - Number(created_date[2])
                }
            }

            if(day < 7){
                cuteAlert({
                    type: "question",
                    title: "INVIZZ",
                    message: "Deactivating your account will automatically cancel your subscription and remove your profile from INVIZZ. If cancelling within the first 7 days of your membership, you will receive a refund. Would you really like to deactivate your account?",
                    confirmText: "Yes",
                    cancelText: "No"
                }).then((e)=>{
                    console.log(e)
                    if (e == ("confirm")){
                        $.ajax({
                            url: "{{ route('payment.subscription.cancel') }}",
                            type: 'POST',
                            data: {'_token': '{{ csrf_token() }}','user_id':user_id, 'subscription': "{{ Auth::user()->subscription }}", 'expired_day':day},
                            dataType:'json',
                            success: function(user_info) {
                                tata.success('INVIZZ', "Account Deactive Success!")
                            },
                            error: function() {
                                tata.error('INVIZZ', "Account Deactive Failed!")
                            }
                        }) 
                    }else{
                        
                    }
                }) 
            }else{
                cuteAlert({
                    type: "question",
                    title: "INVIZZ",
                    message: "Deactivating your account will automatically cancel your subscription and remove your profile from INVIZZ. If cancelling within the first 7 days of your membership, you will receive a refund. Would you really like to deactivate your account?",
                    confirmText: "Yes",
                    cancelText: "No"
                }).then((e)=>{
                    console.log(e)
                    if (e == ("confirm")){
                        $.ajax({
                            url: "{{ route('payment.subscription.cancel') }}",
                            type: 'POST',
                            data: {'_token': '{{ csrf_token() }}','user_id':user_id, 'subscription': "{{ Auth::user()->subscription }}", 'expired_day':day},
                            dataType:'json',
                            success: function(user_info) {
                                tata.success('INVIZZ', "Account Deactive Success!")
                            },
                            error: function() {
                                tata.error('INVIZZ', "Account Deactive Failed!")
                            }
                        }) 
                    }else{
                        
                    }
                }) 
            }
            

            
        })
    })
</script>
