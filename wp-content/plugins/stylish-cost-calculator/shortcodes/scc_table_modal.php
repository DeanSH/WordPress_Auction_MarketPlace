<div id ="scctableprice" class="scctableform hover_bkgr_fricctableprice" style="width: 100%;">
  <style>
  .performance-facts {
    border: 1px solid black;
    margin: 10px;
    float: left;
    width: 600px;
    padding: 0.5rem;
    table {
      border-collapse: collapse;
    }
  }

  .performance-facts__title {
    text-align: left;
    font-weight: bold;
    font-size: <?php echo (int)$result_2->servicepricefontsize +6; ?>px !important; /* Set a font size */
    margin: 0;
  }

  .performance-facts__summary {
    text-align: left;
    font-weight: bold;
    font-size:  <?php echo $result_2->servicepricefontsize; ?> !important;
    color: black;
    margin: 0;
  }

  .performance-facts__summary1 {
    color: white !important;
    margin: 0;
    border: 1px solid white;
    height: 100%;
    display: flex;
    align-items: center;
    font-size: <?php echo (int)$result_2->servicepricefontsize +2; ?>px !important; /* Set a font size */
  }

  .performance-facts__summary2 {
    text-align: center;
    font-size:  <?php echo $result_2->servicepricefontsize; ?> !important;
    color: white;
    width: 100%;
    margin: 0;
    height: 100%;
    background: <?php echo $result_2->objectColorPicker; ?> !important;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
  }

  .performance-facts__summary3 {
    text-align: center;
    font-size:  <?php echo $result_2->servicepricefontsize; ?> !important;
    color: black;
    margin: 0;
    height: 100%;
    display: flex;
    align-items: center;
    width: 100%;
    justify-content: start;
  }

  .performance-facts__summary4 {
    font-size:  <?php echo $result_2->servicepricefontsize; ?> !important;
    color: #666;
    margin: 0;
    height: 100%;
  }
  .performance-facts__summary5 {
    text-align: left;
    font-weight: bold;
    font-size:  <?php echo $result_2->servicepricefontsize; ?> !important;
    color: black;
    margin: 0;
  }
  .performance-facts__summary6 {
    color: white !important;
    margin: 0;
    height: 100%;
    display: flex;
    align-items: center;
    font-size: <?php echo (int)$result_2->servicepricefontsize +2; ?>px !important; /* Set a font size */
  }

  .performance-facts__summary7 {
      font-size: <?php echo $result_2->servicepricefontsize; ?> !important;
      color: black;
      margin: 0;
      height: 100%;
      width: 100%;
      text-align: left;
  }
  .performance-facts__header {
    border-bottom: 10px solid black;
    padding: 0 0 0.25rem 0;
    margin: 0 0 0.5rem 0;
    p {
      margin: 0;
    }
  }

  .sscfull-height{
    height: 100%;
    padding: 0.5%;
  }

  .sscfull-width{
    width: : 100%;
  }

  .sscfill-parent{
    width: : 100%;
    height: 100%;
  }

  .position-relative{
    position: relative;
  }

  .nopadding{
    margin: 0;
    padding: 0;
  }

  .hover_bkgr_fricctableprice{
    background:rgba(27, 24, 24, 0.92) !important;
    height:100%;
    position:fixed;
    text-align:center;
    top:0;
    left:0;
    width:100%;
    display:none;
    z-index:10000;
  }

  .hover_bkgr_fricctableprice .helper{
    display:inline-block;
    height:100%;
    vertical-align:middle;
  }

  .hover_bkgr_fricctableprice > div {
    background-color: #fff;
    display: inline-block;
    height: 100%;
    min-height: 100px;
    vertical-align: middle;
    width: 60%;
    position: relative;
    padding: 2% 3%;
    font-family: <?php echo $fontUsed->family; ?> !important;
    font-size: <?php echo $result_2->servicepricefontsize; ?> !important;
    font-weight: normal;
    color: <?php echo $result_2->objectColorPicker; ?> !important;
  }
.scc-span2{
  text-align: left;
  padding-left: 10px;
  font-weight: normal;
  font-size: <?php echo $result_2->servicepricefontsize; ?> !important;
}
  #framtablename, .framtableicon{
    color: <?php echo $result_2->objectColorPicker; ?> !important;
  }

  .table__fricctableprice {
    background: <?php echo $result_2->objectColorPicker; ?> !important;
  }

  .scc_btn_table{
  background-color: transparent !important;
  border: none; /* Remove borders */
  color: <?php echo $result_2->objectColorPicker; ?> !important;
  font-size: <?php echo (int)$result_2->servicepricefontsize; ?>px !important; /* Set a font size */
  cursor: pointer; /* Mouse pointer on hover */
}
  /* Darker background on mouse-over */
  .scc_btn_table:hover {
    background-color: RoyalBlue;
  }

  .scc_button_table:disabled,
  .scc_btn_table:disabled,
  .scc_btn_table[disabled]{
    color: #cccccc  !important;
    cursor: not-allowed;
    pointer-events: none;
    background: transparent !important;
  }

  .center-flex{
      display: flex !important;
      justify-content: center !important;
      align-items: center  !important;
    }

  .center-flex-align{
      display: flex !important;
      align-items: center  !important;
    }

  @media only screen and (max-width: 600px){
    .performance-facts {
      border: 1px solid black;
      margin: 10px;
      float: left;
      width: 600px;
      padding: 0.1rem;
      table {
        border-collapse: collapse;
      }
    }
    .performance-facts__title {
      text-align: left;
      font-weight: bold;
      font-size: <?php echo (int)$result_2->servicepricefontsize; ?>px !important; /* Set a font size */
      margin: 0;
    }
    .performance-facts__summary {
      text-align: left;
      font-weight: bold;
      font-size: 0.35rem;
      color: black;
      margin: 0;
    }
    .performance-facts__summary1 {
      color: white !important;
      margin: 0;
      border: 1px solid white;
      height: 100%;
      display: flex;
      align-items: center;
      font-size: <?php echo (int)$result_2->servicepricefontsize +2; ?>px !important; /* Set a font size */
    }
    .performance-facts__summary2 {
      text-align: center;
      font-size: <?php echo (int)$result_2->servicepricefontsize -2; ?>px !important; /* Set a font size */
      color: white;
      width: 100%;
      margin: 0;
      height: 100%;
      background: <?php echo $result_2->objectColorPicker; ?> !important;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0;
    }

    .performance-facts__summary3 {
      text-align: left;
      font-size: <?php echo (int)$result_2->servicepricefontsize -2; ?>px !important; /* Set a font size */
      color: black;
      margin: 0;
      height: 100%;
      display: flex;
      align-items: center;
      width: 100%;
      justify-content: start;
    }

    .performance-facts__summary4 {
    font-size: <?php echo (int)$result_2->servicepricefontsize -2; ?>px !important; /* Set a font size */
      color: #666;
      margin: 0;
      height: 100%;
    }

    .performance-facts__summary5 {
      text-align: left;
      font-weight: bold;
      font-size:  <?php echo $result_2->servicepricefontsize; ?> !important;
      color: black;
      margin: 0;
    }
    .performance-facts__summary6 {
      color: white !important;
      margin: 0;
      height: 100%;
      display: flex;
      align-items: center;
      font-size: <?php echo (int)$result_2->servicepricefontsize +2; ?>px !important; /* Set a font size */
    }

    .performance-facts__summary7 {
        font-size: <?php echo $result_2->servicepricefontsize; ?> !important;
        color: black;
        margin: 0;
        height: 100%;
        width: 100%;
        text-align: left;
    }
    .hover_bkgr_fricctableprice > div {
      background-color: #fff;
      display: inline-block;
      height: 92%;
      min-height: 100px;
      vertical-align: middle;
      width: 90%;
      position: relative;
      padding: 2% 3%;
      color: <?php echo $result_2->objectColorPicker; ?> !important;
    }
    .table__fricctableprice {
      background: <?php echo $result_2->objectColorPicker; ?> !important;
    }
    .center-flex{
        display: flex !important;
        justify-content: center !important;
        align-items: center  !important;
    }

    .center-flex-align{
        display: flex !important;
        align-items: center  !important;
      }

      .scc_button_table:disabled,
      .scc_btn_table:disabled,
      .scc_btn_table[disabled]{
        color: #cccccc  !important;
        cursor: not-allowed;
        pointer-events: none;
        background: transparent !important;
      }
  }

  @media print {

    .sscfull-container{
      height: 285mm;
      padding: 5%;
    }
    .center-flex{
        display: flex !important;
        justify-content: center !important;
        align-items: center  !important;
    }
#sccTale_price{
  padding: 9%;
}
    .make-grid(sm);

    .visible-xs {
        .responsive-invisibility();
    }

    .hidden-xs {
        .responsive-visibility();
    }

    .hidden-xs.hidden-print {
        .responsive-invisibility();
    }

    .hidden-sm {
        .responsive-invisibility();
    }

    .visible-sm {
        .responsive-visibility();
    }
  }
  </style>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <div id='sccTale_price'></div>
  <!-- <div id='sccCom_price' style="position: sticky;margin-top: -165px;background: transparent;" ></div> -->
</div>
<script>
function CreateTable(parts){
  // if(jQuery('#sccTale_price').length){
  //   jQuery('#sccTale_price').empty();
  // }
  <?php

  $licens = get_option('scc_licensed');
  if($licens ==0) $licens_enable ="disabled"; else $licens_enable ="";

  $body =   "<div class='container sscfull-height sscfull-container' style='width:100%;position: relative;margin: 0; padding: 5%; overflow-y: inherit;'>";
  $body .=   "<div class='row full-width position-relative' style='height: 7%; display: flex;justify-content: center; align-items: center;'>";
  $body .=   "<div class='col-md-9 col-xs-9 sscfull-height position-relative center-flex performance-facts__summary3' style='color: black;'><span style='width: 100%; padding: 1%; height: 100%; display: flex;position: relative;align-items: flex-end;'>Issue On:  ".date('m/d/Y H:i:s')."</span></div>";
  $body .=   "<div class='col-md-1 col-xs-1 sscfull-height position-relative center-flex nopadding' id='sccprinterid'><button ".$licens_enable." class='scc_btn_table'><i class='fa fa-print fa-2x' href='javascript:void(0)' onclick='PrintDoc(".$licens.")'></i></button></div>";
  $body .=   "<div class='col-md-1 col-xs-1 sscfull-height position-relative center-flex nopadding' ><button ".$licens_enable." class='scc_btn_table'><i class='fa fa-floppy-o fa-2x' href='javascript:void(0)' onclick='SaveDoc(".$licens.")'></i></button></div>";
  $body .=   "<div class='col-md-1 col-xs-1 sscfull-height position-relative center-flex nopadding' ><button class='scc_btn_table'><i class='fa fa-close fa-2x' href='javascript:void(0)' onclick='ClosePopup_scc2()'></i></button></div>";
  $body .=   "</div>";
  $body .=   "<div class='row sscfull-width position-relative' style='padding-top:10px; height: 10%; display: flex;justify-content: center; align-items: center;'>";
  $body .=   "<div class='col-md-6 col-xs-6'>";
  $body .=   "<h1 class='performance-facts__title' style='color: black;'>Summary</h1>";
  $body .=   "</div>";
  $body .=   "<div class='col-md-6 col-xs-6' style='padding: 0;'>";
  $body .=   "<h1 id='framtablename' class='performance-facts__title' style='text-align: center;'>".$result->formname."</h1>";
  $body .=   "</div>";
  $body .=   "</div>";
  $body .=   "<div class='row sscfull-width position-relative table__fricctableprice' style='height: 10%; display: flex;justify-content: center; align-items: center;'>";
  $body .=   "<div class='col-md-6 col-xs-6 performance-facts__summary1'><h3 class='performance-facts__summary6'  style=' text-align: left;margin-left: 20px;'>Description<span></h3></div>";
  $body .=   "<div class='col-md-2 col-xs-2 performance-facts__summary1'><h3 class='performance-facts__summary6' >Unit Price</h3></div>";
  $body .=   "<div class='col-md-2 col-xs-2 performance-facts__summary1'><h3 class='performance-facts__summary6' >Quantity</h3></div>";
  $body .=   "<div class='col-md-2 col-xs-2 performance-facts__summary1'><h3 class='performance-facts__summary6' >Price</h3></div>";
  $body .=   "</div>";
  ?>
  var table_body = "<?php echo $body; ?>";
  var totalPrice =0;
  var height = 0;
  <?php
  $count =0;
  foreach ($formstored as $opt) {
    ?>
    table_body+="<div class='row sscfull-width position-relative' style='height: 7%;border: 1px solid #DFDFDF;background:#F0F0F0 !important;display:flex;justify-content: center; align-items: center;'>";
    table_body+="<div class='col-md-12 col-xs-12'><h3 class='performance-facts__summary5'><?php echo $opt->name ?></h3></div></div>";
    height +=6;
    for(var i=0;i<parts.length;i++){
      var _count = <?php echo $count; ?>;
      if(_count == parts[i].section){
        if(parts[i].name =="" || parts[i].name.toLowerCase() =="choose an option..."){}
        else{
          table_body+="<div class='row' style='height: 10%;display: flex;border: 1px solid #DFDFDF; justify-content: center; align-items: center;font-size: 1.5rem;'>";
          table_body+="<div class='col-md-6 col-xs-6 sscfull-height center-flex-align'>"+parts[i].name+"</div>";
          table_body+="<div class='col-md-2 col-xs-2 sscfull-height center-flex-align'><h4 class='performance-facts__summary3'>$"+parts[i].value+"</h4></div>";
          table_body+="<div class='col-md-2 col-xs-2 sscfull-height center-flex-align'><h4 class='performance-facts__summary3'>"+parts[i].unit+"</h4></div>";
          table_body+="<div class='col-md-2 col-xs-2 sscfull-height center-flex-align'><h4 class='performance-facts__summary3'>$"+(parts[i].unit*parts[i].value)+"</h4></div>";
          table_body+="</div>";
          totalPrice +=parts[i].unit*parts[i].value;
          height +=6;
        }
      }
    }
    <?php
    ++$count;
  }
  ?>
  table_body+="  <div class='row full-width position-relative' style='height: 5%; display: flex;justify-content: center; align-items: center;'></div>";
  table_body+="  <div class='row full-width position-relative' style='height: 10%; display: flex;justify-content: center; align-items: center;'>";
  table_body+="    <div class='col-md-6 col-xs-6'></div>";
  table_body+="    <div class='col-md-3 col-xs-3 sscfull-height position-relative table__fricctableprice' style='border: 1px solid white;display: flex; justify-content: center; align-items: center;'><span class='performance-facts__summary6 '' >Total Price:</span></div>";
  table_body+="    <div class='col-md-3 col-xs-3 sscfull-height position-relative table__fricctableprice' style='border: 1px solid white;display: flex; justify-content: center; align-items: center;'><h3 class='performance-facts__summary6 ' >$"+totalPrice+"</span></div>";
  table_body+="    </div>";
  var xheight = 42+height - 100;
  if (xheight <= 5) xheight =5;console.log(xheight, height);
  table_body+="  <div class='row sscfull-width position-relative' style='height:"+xheight+"%; display: flex;justify-content: center; align-items: center;'></div>";
  table_body+="<div id='sccidsent' class='sscfull-height position-relative'>"
  table_body+="<div class='row sscfull-width position-relative scccontrol' id='sccemailid' style='height: 7%; display: flex;justify-content: center; align-items: center;'>";
  table_body+="<div class='col-md-3 col-xs-3 sscfull-height' style='background:#f0f0f0;display: flex; justify-content: center; align-items: center;padding: 0.5%;'><input id='sscuserAddress' class='performance-facts__summary4' type='text'placeholder='Name' style='color:#666;'/></div>";
  table_body+="<div class='col-md-3 col-xs-3 sscfull-height' style='background:#f0f0f0;display: flex; justify-content: center; align-items: center;padding: 0.5%;'><input id='sscemailAddress' class='performance-facts__summary4' type='email' placeholder='Email' style='color:#666;'/></div>";
  table_body+="<div class='col-md-3 col-xs-3 sscfull-height' style='background:#f0f0f0;display: flex; justify-content: center; align-items: center;padding: 0.5%;'><input class='performance-facts__summary4' type='text' placeholder='Phone (Optional)' style='color:#666;'/></div>";
  table_body+="<div class='col-md-3 col-xs-3 sscfull-height' style='background:#f0f0f0;display: flex; justify-content: center; align-items: center;padding: 0.5%; table__fricctableprice'><button "+'<?php echo $licens_enable; ?>'+" class='scc_button_table performance-facts__summary2' style='' onclick='javascript:sendemail("+<?php echo $licens; ?>+");' id='sendemail'><span>SEND</span></button></div>";
  table_body+="</div>";
  table_body+="</div>";
  table_body+="</div>";

  jQuery('#sccTale_price').html(table_body);
}

function SaveDoc(enable){
  if(enable ==0)
    return;
 jQuery('#sccidsent').hide();
  var isReady = false;
  var title = document.getElementById("framtablename").innerText;
  var w = document.getElementById("sccTale_price").offsetWidth+10;
  var h = document.getElementById("sccTale_price").offsetHeight+10;

  document.getElementById('sccTale_price').scrollIntoView();
  html2canvas(document.querySelector("#sccTale_price"), {
    logging: false,
    allowTaint: true
  }, {dpi: 150,scale: 4}).then(function(canvas) {
    var link = document.createElement("a");
    document.body.appendChild(link);

    link.href = canvas.toDataURL("image/png",1);

    const pdf = new jsPDF('p', 'pt', [w, h]);
    pdf.addImage(link.href, 'PNG', 0, 0, w,h);
    pdf.save(title+'.pdf');
  });
 setTimeout(function(){ClosePopup_scc2();jQuery('#sccidsent').show();},600);
}

function sendemail($enable){
  if($enable ==0)
    return;
  var title = document.getElementById("framtablename").innerText;
  jQuery('#sccidsent').hide();
  document.getElementById('sccTale_price').scrollIntoView();
  html2canvas(document.querySelector("#sccTale_price"), {
    logging: false,
    allowTaint: true
  }).then(function(canvas) {
    var link = document.createElement("a");
    document.body.appendChild(link);

    link.href = canvas.toDataURL("image/png",1);
    const pdf = new jsPDF();
    pdf.addImage(link.href, 'PNG', 0, 0);
    check(link.href,title);
  });
  setTimeout(function(){jQuery('#sccidsent').show();},600);
}

function check(img,title){
  var email = jQuery('#sscemailAddress').val();
  var user = jQuery('#sscuserAddress').val();
  console.log(email);
  $fragment_refresh={
    url: rt_vars.rt_urlajax,
    type: 'POST',
    data: {
      action: 'sccSendEmail',
      image : img,
      email_to: email,
      user_to: user,
      title: title
    },
    success: function(data) {
      console.log(data);
      ClosePopup_scc2();
      jQuery('#statusMsg').html('<span style="font-size:14px;color:#34A853"> Message has been sent to '+user+' &lt;'+email+'&gt;.</span>');
    }
  };
  jQuery.ajax( $fragment_refresh );
}

PrintDoc = function(enable){
  if(enable ==0)
  return;

   var printContents = document.getElementById('scctableprice').innerHTML;
   var originalContents = document.body.innerHTML;
   document.body.innerHTML = printContents;
   window.print();
   document.body.innerHTML = originalContents;
}
</script>
