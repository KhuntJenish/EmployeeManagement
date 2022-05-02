
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
             window.location = `/page/ledger/report.php?delete=${sno}`;
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

 // logout button click event
document.getElementById("logout").addEventListener("click",(e)=>{
  window.location = `/logout.php`;
});

  // edit button click dhagacuting modalevent
  aedits = document.getElementsByClassName("dedit");
  Array.from(aedits).forEach((element) => {
      element.addEventListener("click", (e) => {
          const btn = document.getElementById("dhagacuting");
          btn.innerText = 'update';
          btn.name = 'update';
          dname = btn.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[1].childNodes[3];
          saree = btn.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[3].childNodes[3];
          price = btn.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[5].childNodes[
            3];
            date = btn.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[7].childNodes[3];
            sno = btn.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[7].childNodes[5];
            console.log(btn.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[7].childNodes[5]);
            //Fillup value in modal    
            // name
            dname.value = e.target.parentNode.parentNode.childNodes[1].innerText;
            // // saree
            saree.value = e.target.parentNode.parentNode.childNodes[3].innerText;
            
            // //price
            price.value = e.target.parentNode.parentNode.childNodes[5].innerText;
            
            
            // // date
            date.value = e.target.parentNode.parentNode.childNodes[9].innerText;
          
          

     

          sno.value = e.target.id;
          console.log(e.target.id);


          console.log("edit");
          $("#dhagacutingModal").modal({
              show: false,
              keyboard: false,
              backdrop: "static",
          });
          $("#dhagacutingModal").modal("show");
          console.log("edit");
      })
  });



  // delete button dhagacuting click event
  adelete = document.getElementsByClassName("ddelete");
  Array.from(adelete).forEach((element) => {
      element.addEventListener("click", (e) => {
          sno = e.target.id;
          // console.log(sno);
          if (confirm("Are you sure delete this Notes!")) {
              console.log("yes");
              window.location = `/page/transaction/adddhagacuting.php?delete=${sno}`;
          } else {
              console.log("no");
          }
      });
  });
