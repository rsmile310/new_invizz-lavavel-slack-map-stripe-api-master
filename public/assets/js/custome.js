function infofunc(e, info) {
    var i, content, links;
    content = document.getElementsByClassName("demo2");
    for (i = 0; i < content.length; i++) {
        content[i].style.display = "none";
    }
    links = document.getElementsByClassName("demo");
    for (i = 0; i < links.length; i++) {
        links[i].className = links[i].className.replace(" active", "");
    }
    document.getElementById(info).style.display = "block";
    if (info == "lite") document.getElementById('membership_type').value = 'monthly'
    else document.getElementById('membership_type').value = 'annual'

    console.log(document.getElementById('membership_type').value)
    e.currentTarget.className += " active";
}

function step(e) {
    var i, content, links;
    // content = document.getElementsByClassName("demo2");
    // for (i = 0; i < content.length; i++) {
    //     content[i].style.display = "none";
    // }
    links = document.getElementsByClassName("each");
    for (i = 0; i < links.length; i++) {
        links[i].className = links[i].className.replace(" active", "");
    }
    // document.getElementById(info).style.display = "block";
    e.currentTarget.className += " active";
}