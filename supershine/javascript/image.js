const memberImage = document.querySelector("#memberImage")
const blogImage = document.querySelector("#blogImage")
const beforeImage = document.querySelector("#beforeImage")
const afterImage = document.querySelector("#afterImage")

function onChangeMemberImage(event) {
    var file = event.target.files[0];
    var reader = new FileReader();
    reader.onload = function(e) {
        memberImage.src = e.target.result;
    };
    reader.readAsDataURL(file);
}


function onChangeBlogImage(event) {
    var file = event.target.files[0];
    var reader = new FileReader();
    reader.onload = function(e) {
        blogImage.src = e.target.result;
    };
    reader.readAsDataURL(file);
}


function onChangeBeforeImage(event) {
    var file = event.target.files[0];
    var reader = new FileReader();
    reader.onload = function(e) {
        beforeImage.src = e.target.result;
    };
    reader.readAsDataURL(file);
}


function onChangeAfterImage(event) {
    var file = event.target.files[0];
    var reader = new FileReader();
    reader.onload = function(e) {
        afterImage.src = e.target.result;
    };
    reader.readAsDataURL(file);
}