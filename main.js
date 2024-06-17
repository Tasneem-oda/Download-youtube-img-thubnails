const urlinput = document.querySelector('.input'); 
let imgTag = document.querySelector('img');
let hidden_input = document.querySelector('.hidden_input');
// https : https://www.youtube.com/watch?v=9aT_OpLKLls
urlinput.onkeyup = ()=>{
    let imgURL = urlinput.value;
    if(imgURL.indexOf("https://www.youtube.com/watch?v=")!= -1){ //check if the etered link contain that link
        let vidId = imgURL.split("v=")[1].substring(0, 11); // cut the link from there to get the video id
        let ytThumburl =`https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`; // butting the id in the custoum youtyoube thumbnail lilnk
        imgTag.src = ytThumburl; // changing the src of the img tag
    }else if (imgURL.indexOf("https://youtu.be/") != -1){ //check olso for the shortened vertion of the link
        let vidId = imgURL.split("be/")[1].substring(0, 11);// get the vid id from it
        let ytThumburl =`https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`; //  butting the id in the custoum youtyoube thumbnail lilnk
        imgTag.src = ytThumburl;
    }else{
        imgTag.src = imgURL;
    }
    hidden_input.value = imgTag.src; // but the image URL in the hiddin input to reload it
}