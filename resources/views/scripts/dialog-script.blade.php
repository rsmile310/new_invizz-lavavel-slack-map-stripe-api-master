<script>
    $(document).ready(function() {
        $(".change-map").click(function(){
           $(".artists-list").toggleClass(function(){
               return "hide-screen"
            })
            $(".change-list").removeClass('hide-screen')
            $(".change-map").addClass('hide-screen')
        })

        $(".change-list").click(function(){
           $(".artists-list").toggleClass(function(){
               return "hide-screen"
            })
            $(".change-map").removeClass('hide-screen')
            $(".change-list").addClass('hide-screen')
        })

        $("#btn-close").click(function() {
            $("#modal-profile-dialog").hide()
        })

        $("[id^='profiledetail_']").click(function() {
            var id = $(this).attr('id')
            var id_n = id.split('_')
            id_n = id_n[1]
            var image_src = $("#avatar_" + id_n).attr('src')
            var login_info = '<?php echo $login_info; ?>'
            var active = '<?php echo $active; ?>'

            if (login_info == "on" && active=="on") {
                $.ajax({
                    url: '/profiledialog',
                    type: 'POST',
                    data: { '_token': '{{ csrf_token() }}', 'image_src': image_src },
                    dataType: 'json',
                    success: function(user_info) {
                        $("#artist_name").html(user_info['first_name'] + ' ' + user_info['last_name'])

                        if(user_info['a_type'])
                            $("#artist_type").html(user_info['a_type'])
                        else
                            $("#artist_type").html("Other")
                            
                        $("#artist_location").html(user_info['address'])

                        var temp = user_info['dob']
                        temp = temp.split('-')
                        var cur_date = new Date()
                        var age = cur_date.getFullYear() - Number(temp[0])
                        if(((cur_date.getMonth()+1) - Number(temp[1]))<0) age -= 1

                        console.log(cur_date.getMonth()+1, Number(temp[1]))
                        console.log(user_info['hide_age'])
                        if(user_info['hide_age'] == 'off'){
                            $("#artist_age").html("&nbsp;Age: "+age)
                        }else{
                            $("#artist_age").html("&nbsp;Age: Unknown")
                        }

                        if(user_info['social_fb'] == null) user_info['social_fb'] = "Your FaceBook"
                        if(user_info['social_insta'] == null) user_info['social_insta'] = "Your Instagram"
                        if(user_info['social_tw'] == null) user_info['social_tw'] = "Your Twitter"
                        if(user_info['social_lin'] == null) user_info['social_lin'] = "Your Linkedin"

                        $("#artist_fb").html("<a href='"+user_info['social_fb']+"' target='_blank'>"+user_info['social_fb']+"</a>")
                        $("#artist_in").html("<a href='"+user_info['social_insta']+"' target='_blank'>"+user_info['social_insta']+"</a>")
                        $("#artist_rw").html("<a href='https://twitter.com/"+user_info['social_tw']+"' target='_blank'>"+user_info['social_tw']+"</a>")
                        $("#artist_lin").html("<a href='"+user_info['social_lin']+"' target='_blank'>"+user_info['social_lin']+"</a>")
                        
                        $("#join_invizz").attr('href', "https://slack.com/app_redirect?channel="+user_info['slack_url'])
                        
                        $("#artist_mail").html(user_info['email'])
                        $("#my_bio").html(user_info['bio'])

                    },
                    error: function() {
                        console.log('error');
                    }
                })

                $("#modal-profile-dialog").show()
                $("#profile-avatar").attr('src', image_src)
            } else {
                // VanillaToasts.create({
                //     title: 'INVIZZ',
                //     text: 'Profile info can see only registered artists, if you want to collab with another artist, please register on INVIZZ.',
                //     type: 'success', // success, info, warning, error   / optional parameter
                //     icon: image_src, // optional parameter
                //     timeout: 115000, // hide after 5000ms, // optional parameter
                //     callback: function() {
                //         console.log('asdfasdf')
                //     } // executed when toast is clicked / optional parameter
                // });

                // cuteAlert({
                //     type: "success",
                //     title: "Success Title",
                //     message: "Success Message",
                //     buttonText: "Okay"
                // })

                // cuteAlert({
                //     type: "question",
                //     title: "Confirm Title",
                //     message: "Confirm Message",
                //     confirmText: "Okay",
                //     cancelText: "Cancel"
                // }).then((e)=>{
                //     console.log(e)
                //     if (e == ("confirm")){
                //         $("#register-modal").show()
                //     }else{
                //         alert('asdfasdf')
                //     }
                // })

                tata.info('INVIZZ', 'If you want to collab with another artist, please register on INVIZZ.')
            }
        })

        $("#btn_slack").click(function(){
            var email = $("#artist_mail").html()
            $.ajax({
                url: "{{ route('slack.sendmessage') }}",
                type: 'GET',
                data: { '_token': '{{ csrf_token() }}', 'email': email },
                dataType: 'json',
                success: function(result) {
                   console.log('success')
                },
                error: function() {
                    console.log('error');
                }
            })
        })
        
        $("#artist_type_for_search").change(function() {
            var zipcode = $("#search_address").val()
            $("#serchbyzipcode").val(zipcode)
            $("#filterbytype").submit()
        })
    })
</script>
