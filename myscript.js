
 // delete button click event
 deletes = document.getElementsByClassName("delete");
 console.log(deletes);
 Array.from(deletes).forEach((element) => {
     element.addEventListener("click", (e) => {
       //  console.log(sno);
       a = e.target.id;
       sno = a;
       console.log(a);
     
         if (confirm("Are you sure delete this Notes!")) {
             console.log("yes");
             window.location = `/employee/page/production/addProduction.php?delete=${sno}`;
         } else {
             console.log("no");
         }
     });
 });



 // edit button click sale modalevent
pedits = document.getElementsByClassName("pedit");
Array.from(pedits).forEach((element) => {
  element.addEventListener("click", (e) => {
    console.log("production edit");
    tr = e.target.parentNode.parentNode;
 
    console.log(tr);
    machineno = tr.getElementsByTagName("td")[0].innerText;
    pname = tr.getElementsByTagName("td")[1].innerText;
    production = tr.getElementsByTagName("td")[2].innerText;
    duty = tr.getElementsByTagName("td")[3].innerText;
    frame = tr.getElementsByTagName("td")[4].innerText;
    tb = tr.getElementsByTagName("td")[5].innerText;
    date = tr.getElementsByTagName("td")[6].innerText;
 
    console.log(
        machineno
    );
    document.getElementById("mmachineno").value = machineno;
    document.getElementById("mname").value = pname;
    console.log(document.getElementById("mname").value);
    document.getElementById("mproduction").value = production;
    document.getElementById("mduty").value = duty;
    document.getElementById("mframe").value = frame;
    document.getElementById("mtb").value = tb;
    document.getElementById("mdate").value = date;
   

    var num = 1;

    console.log(num);


    snoEdit.value = e.target.id;
    console.log(e.target.id);
    console.log(snoEdit.value);
    $("#peditModal").modal({
      show: false,
      keyboard: false,
      backdrop: "static",
    });
    $("#peditModal").modal("show");
  });
});



function reload() {
    location.reload();
}
