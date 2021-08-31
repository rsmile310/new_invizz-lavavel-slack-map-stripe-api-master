<script>
    var geocoder = new google.maps.Geocoder();
    
    // ------------- database --------------//
    var cities = new Array();
    var images = new Array();
    var names = new Array();
    var coordinate = new Array();

    //-------------- end -------------------//


    // ------------- javascript ------------//
    var lat_lng = new Array();

    // -------------- end ------------------//

    var count = 0;

    <?php foreach($map_artists as $artist){?>
        cities.push('<?php echo $artist->address; ?>')
        images.push('<?php echo $artist->avatar_src; ?>')
        names.push('<?php echo $artist->first_name." ".$artist->last_name; ?>')
        coordinate.push('<?php echo $artist->coordinate; ?>')
    <?php }?>

    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 5,
        center: new google.maps.LatLng(39.774769, -101.305086),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    const myLatlng = { lat: 39.774769, lng: -101.305086 };

    console.log(myLatlng)
    map.addListener("zoom_changed", () => {
        console.log(map.getZoom())
        var zoom = map.getZoom()
        if(zoom < 4){
             map.setZoom(5)
             map.panTo(myLatlng)
        }
    });

    var c_point = '{{ $centerOflocation }}'

    console.log("my position:", c_point)

    var centerOf = c_point.split(',')
    console.log(centerOf)

    var centerOf_lat_lng = {}
    centerOf_lat_lng['lat'] = Number(centerOf[0])
    centerOf_lat_lng['lng'] = Number(centerOf[1])

    console.log(centerOf_lat_lng)

    map.panTo(centerOf_lat_lng)

    if(centerOf_lat_lng.lat != myLatlng.lat) map.setZoom(8)

    for(row in coordinate){
        var temp = coordinate[row].split(',')
        lat_lng.push(temp)
    } 

    for(row in lat_lng){
        console.log(lat_lng[row][0], lat_lng[row][1])        
    } 


    var marker;

    //adapted from http://gmaps-samples-v3.googlecode.com/svn/trunk/overlayview/custommarker.html
    function CustomMarker(latlng, map, imageSrc) {
        this.latlng_ = latlng;
        this.imageSrc = imageSrc;
        // Once the LatLng and text are set, add the overlay to the map.  This will
        // trigger a call to panes_changed which should in turn call draw.
        this.setMap(map);
        
    }

    CustomMarker.prototype = new google.maps.OverlayView();

    CustomMarker.prototype.draw = function() {
        // Check if the div has been created.
        var div = this.div_;
        if (!div) {
            // Create a overlay text DIV
            div = this.div_ = document.createElement('div');
            // Create the DIV representing our CustomMarker
            div.className = "customMarker"

            var img = document.createElement("img");
            img.src = this.imageSrc;
            div.appendChild(img);
            var me = this;
            google.maps.event.addDomListener(div, "click", function(event) {
                google.maps.event.trigger(me, "click");
            });

            // Then add the overlay to the DOM
            var panes = this.getPanes();
            panes.overlayImage.appendChild(div);
        }

        // Position the overlay 

        var point = this.getProjection().fromLatLngToDivPixel(this.latlng_);
        if (point) {
            div.style.left = point.x + 'px';
            div.style.top = point.y + 'px';
        }
    };

    CustomMarker.prototype.remove = function() {
        // Check if the overlay was on the map and needs to be removed.
        if (this.div_) {
            this.div_.parentNode.removeChild(this.div_);
            this.div_ = null;
        }
    };

    CustomMarker.prototype.getPosition = function() {
        return this.latlng_;
    };

    const secretMessages = ["This", "is", "the", "secret", "message"];

    var active = '<?php echo $active; ?>'
    for(var i = 0; i < cities.length; i++){
        marker = new CustomMarker(new google.maps.LatLng(lat_lng[i][0], lat_lng[i][1]), map, images[i])
        marker.addListener("click", () => {

            var login_info = '<?php echo $login_info; ?>'
            var image_src = event.target.getAttribute("src")
                console.log("my_src", image_src)
            if(login_info=="on" && active=="on" && image_src != null){
                $.ajax({
                    url: '/profiledialog',
                    type: 'POST',
                    data: {'_token': '{{ csrf_token() }}', 'image_src': image_src },
                    dataType:'json',
                    success: function(user_info) {
                        $("#artist_name").html(user_info['first_name']+' '+user_info['last_name'])

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
                $("#profile-avatar").attr('src', event.target.getAttribute("src"))
            }else{
                if(login_info!="on"){
                    tata.info('INVIZZ', 'If you want to collab with another artist, please register on INVIZZ.')
                }
            }
        });
    }
  
</script>