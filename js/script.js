let addedCheckBoxes = [];
let removedCheckBoxes = [];


function onCheckValueChanged(e){

    if(e.checked){
        addedCheckBoxes.push(e.id);
    }
    else{
        addedCheckBoxes = addedCheckBoxes.filter(function (value, index, arr) {
               return value !== e.id;
        });
    }
    console.log("length:" + addedCheckBoxes.length);

}

function sendArray(floor, block, user) {
    console.log("Half Success");
    console.log(block + "; " + floor);
    console.log(user)
    $.ajax({
        type: "POST",
        url: '../API/process-change.php',
        data: {array: addedCheckBoxes, floor: floor, block: block, userId: user },

        success: function (data) {
            console.log(data);
        },
        error: function(xmlhttp, status, error){ alert(error); }
    });
}