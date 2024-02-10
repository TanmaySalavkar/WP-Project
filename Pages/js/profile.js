/* --------------------------------Checking if user has given description------------------------*/
var description = document.getElementById('description').innerText.trim();
if (description !== '') {
    document.getElementById('descriptionSection').style.display = 'block';
}
/* --------------------------------------XOX----------------------------------------------*/



/* ---------------------------Checking if has pinned any Repositories-------------------*/
var table = document.getElementById('repo-list');
var hasData = false;

for(var i=0;i< table.rows.length;i++){
    for (var j=0; j < table.rows[i].cells.length ; j++) {
        if(table.rows[i].cells[j].innerText.trim()!==''){
            hasData = true;           
            break;
        }   
    }
    if(hasData){
        break;
    }
}
if (hasData){
    document.querySelector('.popular-repo').style.display='block';
}
/* ------------------------------------------XOX--------------------------------------------*/



/* ----------------------Enlarging Profile Photo-----------------------------------------*/
function openModal(){
    var modal = document.getElementById("myModal");
    var img = document.getElementById("profile-photo");
    var modalimg = document.getElementById('pr-img');
    modal.style.display = "block";
    modalimg.src = img.src;
}

function closeModal(){
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}
/* ----------------------------------XOX--------------------------------------------------------------*/

