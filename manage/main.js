var userid = $("input[name*='userId']");
//id.attr("readonly","readonly");


$(".btnedit").click(e => {
    let textvalues = displayData(e);

    ;
    let name = $("input[name*='name']");
    let username = $("input[name*='username']");
    let email = $("input[name*='email']");
    let role = $("input[name*='role']");


    userid.val(textvalues[0]);
    name.val(textvalues[1]);
    username.val(textvalues[2]);
    email.val(textvalues[3]);
    role.val(textvalues[4]);


});


function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td) {
        if (value.dataset.id == e.target.dataset.id) {
            textvalues[id++] = value.textContent;
        }
    }
    return textvalues;

}