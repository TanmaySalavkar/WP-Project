var a;
function pass(){
    if(a==1){
        document.getElementById('confirm_password').type='password';
        document.getElementById('pass-icon').src='whiteeye.png';
        a=0;
    }
    else{
        document.getElementById('confirm_password').type='text';
        document.getElementById('pass-icon').src='white.png';
        a=1;
    }
}
