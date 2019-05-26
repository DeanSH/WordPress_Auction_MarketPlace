<div class="col-xs-12 col-md-12 col-lg-12">  <!-- This affects the size of the main container -->
  <div class="scc_wrapper"><div style="clear: both;" id="previewInputsAdd" class="scc_wrapper"></div></div>

  <div class="hover_bkgr_fricc">
      <span class="helper"></span>
      <div>
          <div class="popupCloseButton" href="javascript:void(0)" onClick="ClosePopup()">x</div>
          <b>You cannot add more than three items.<br> Purchase the pro version <a href="https://designful.ca/apps/stylish-cost-calculator-wordpress/">here</a> for $20 today!</b>
      </div>
  </div>
   <div style="clear: both;"></div>
   <div id="themainwarning"></div>
   <br>
     <div id="scc-demover" data-demo="<?php echo get_option('scc_licensed');?>" style="text-align: center;"></div>
   <br>
   <div class="xxx" style="padding-bottom:20px;"><div class="purple_bar" style="text-align:center;">Calculator Input Fields</div></div>
   <div id="allinputstoadd" class="col-xs-6 col-lg-6 col-md-6"> </div>  <!-- This affects the size of the main input containers -->
   <div style="max-width:400px;">
     <label class="col-xs-12 col-lg-12 col-md-12" style="padding: 16px;border: 2px solid #C0C0C0;border-radius: 4px;  width: 207%;margin: 22px;">
       <a href="javascript:void(0)" onClick="addAnotherField()" class="crossnadd2">+ Add Section</a>
     </label>
   </div>
   <div style="display: none" id="inputtoadd">
     <div class="addedFieldsStyle">
       <div id="title54-bar">
         <div id="title54">
           <span style="vertical-align: middle;">
             <input type="text" class="input_pad sectiontitle" placeholder="Section Title" value="" style="margin-top: 12px;margin-left: -58px;width: 248px;height: 36px;" required />
             <span class="mandatory">*</span>
           </span>
         </div>
         <div id="title54-bar-btns">
           <button id="close-btn" class="btnn material-icons" href="javascript:void(0)" onClick="removeField(this)" style="line-height: 34px;width: 39px;">close</button>
           <button id="down-btn" class="btnn material-icons down" style="display: none; line-height: 34px;width: 39px;" href="javascript:void(0)" onClick="rdown(this)">arrow_drop_down</button>
           <button id="up-btn" class="btnn material-icons up" style="display: none; line-height: 34px;width: 39px;" href="javascript:void(0)" onClick="rup(this)">arrow_drop_up</button>
         </div>
       </div>
       <!--<label class="scc_label" style="padding: none; width: 40%; float: left;margin-top: 5px;">Section Description </label>--->
       <textarea class="input_pad sectionDescription" placeholder="Description of this product or service" style="height:125px;padding: 15px;width: 91%;margin-left: 22px;"> </textarea>
       <div class="fieldDatatoAdd">
         <div class="boardOption1">
           <label style="width: 100%;">
             <a href="javascript:void(0)" onClick="addAnotherElement(this)" class="crossnadd2">+ Add Subsection </a>
           </label>
         </div>
       </div>
     </div>
   </div>
   <!--- ********************************************************************************************************************************* -->
   <!-- <label class="scc_label col-xs-12 col-md-2" style="text-align: left;padding-top:40px;">
     <a class="scc_button" href="javascript:void(0)" onClick="saveFields()">SAVE</a>
   </label> -->
    <!--- ********************************************************************************************************************************* -->
   <div style="display: none">
     <div id="fieldDatatoAdd">
       <div class="boardOption1">
         <label style="width: 100%;">
           <a href="javascript:void(0)" onClick="addAnotherElement(this)" class="crossnadd2">+ Add Subsection </a>
         </label>
       </div>
     </div>
     <div id="fieldDatatoAdd11">
       <hgroup class="speech-bubble">
         <div class="AnimCloseButton" href="javascript:void(0)" onClick="ClosePopup1()">x</div>
         <div style="line-height: 15px;">
           <b>PRO TIP</b>
           <br> Everything in this <b>Subsection</b> will effect the total price.
           <br><b>Example:</b> a slider quantity will be multiplied by dropdown or checkbox in the same <b>section.</b>
         </div>
       </hgroup>
       <div class="boardOption">
         <div class"bar" style="background: #E8E8E8;">
         <button id="close-btn" class="collapsible" href="javascript:void(0)" onClick="removeField1(this)" style="width:10%;">x</button>
         <button class="collapsible">Subsection</button>
        </div>
         <li class='form-line'>
           <div class="BodyOption">
             <label class="scc_label" style="padding-left: 20px;width:30%;text-align:left;">Input Type</label>
             <select onchange="getFieldOptionx(this)" style="width:50%;min-width:50%;margin-top:20px;" class="getfieldoptionx ">
               <option value=""></option>
               <option value="dropdowninput">Dropdown Menu</option>
               <option value="switchinput">Checkbox</option>
               <!-- <option value="addSlider(this)">Combind Slide</option> -->
             </select>
             <div style="clear: both;"></div>
             <div style="clear: both;"></div>
           </div>
         </li>


			   <div id="title5400-bar-btns" class="buttonclass11">
				<button id="min-btn" class="crossnadd" href="javascript:void(0)" onClick="addAnotherOption(this)" style="border: none;">+ Add A Dropdown, Checkbox or Switch</button>
			   </div>


			   <div id="title54-bar" style="">
				 <div id="title5400" style="" class="buttonclass11">
				   <span style="vertical-align: middle; ">
					 <input class="inputoption_slidchk" type="checkbox" onClick="addSlider(this)"  style="display:none;"/>
					   <button id="min-btn" class="crossnadd" href="javascript:void(0)" onClick="addSlider(this)" style="border: none;">+ Add A Slider</button>
				   </span>
				 </div>
			   </div>


		<div class="selslideropt_3" style="display:none;">
         <hr />
         <p style="text-align:center; width: 80%;margin-left: 37px;">
           If you choose to use a slider, the slider values will be multiplied by the SUM values of above options.
         </p>
         <div style="clear: both;"></div>
         <div class="selslideropt_4">
			<label class="scc_label  col-xs-12 col-md-5" style="margin-top:-7px;text-align:right;">Slider Name</label>
			<input type="text" class="col-xs-12 col-md-5 input_pad sliderinputoption_T" style="margin-top:7px;" value="" />
			<div style="clear: both;"></div>
			 <label class="scc_label  col-xs-12 col-md-5" style="margin-top:-7px;text-align:right;">Slider Step</label>
			 <input type="text" class="col-xs-12 col-md-2 input_pad slidoption_3" value="1" style="margin-top:7px;" align="center" />
			 <div style="clear: both;"></div>
			 <label class="scc_label  col-xs-12 col-md-5" style="margin-top:-7px;text-align:right;">Slider Default Value</label>
			 <input type="text" class="col-xs-12 col-md-2 input_pad slidoption_4" value="1" val="1" style="margin-top:7px;" align="center" />
		   <div style="clear: both;"></div>
           <div style="padding: 5px; margin:5px;">
		      <table class="price_table" cellpadding="0" cellspacing="0" >


						<caption style="text-align: center;padding-top:20px;margin-bottom:-20px;" class="scc_label">Price Range</caption>


					   <thead>
						 <tr>
						   <th><label class="scc_label  col-xs-12 col-md-3" style="padding-left:20px;">FROM</label></th>
						   <th><label class="scc_label  col-xs-12 col-md-3" style="padding-left:10px;">TO</label></th>
						   <th><label class="scc_label  col-xs-12 col-md-3" style="padding-left:10px;">Price($)</label></th>
						 </tr>
					   </thead>
					   <tbody>
						 <tr>
						   <th><input type="number" min=0 class="scc_label input_pad sliderinputoption scc_input" value="0" style="width: 95%;margin-left:12px;" align="center" /></th>
						   <th><input type="number" min=0 class="scc_label  input_pad sliderinputoption_2 scc_input" value="100" style="width: 95%;margin-left:12px;" align="center" /></th>
						   <th><input type="number" min=0 class="scc_label  input_pad sliderinputoption_5 scc_input" value="1" style="width: 95%;margin-left:12px;" align="center" /></th>
						   <th>
							 <lable style="width: 10%;font-size: 15px;"></lable>
						   </th>
						 </tr>
					   </tbody>

			 </table>

           </div>
           </div>
           <div class="col-lg-12 col-md-12 col-xs-12" style="text-align:center;padding-top:10px;padding-bottom:30px;">
             <a href="javascript:void(0)" onClick="addNewRange(this)" class="crossnadd" style="font-size: 13px;">+ Add Price Range</a>
           </div>
         </div>

       </div>
      </div>
     </div>
     <div id="titledescdiv" style="display: none">
       <button id="close-btn" class="collapsible" href="javascript:void(0)" onClick="removeField2(this)" style="width:10%;">x</button>
       <button class="collapsible">Fix Selection</button>
       <button id="close-btn" class="collapsible" href="javascript:void(0)" onclick="colla(this)" style="width:10%;">-</button>
       <div class="content" value="titledescdiv">

         <label class="scc_label  col-xs-12 col-md-5" style="margin-top:15px;">Product/Service </label>
         <input type="text"  class="col-xs-12 col-md-5 input_pad sliderinputoption_T" style="margin-top:5px;" value="" />
         <label class="scc_label  " style="width: 40%;margin-bottom:10px;">Price</label>
         <input type="number" min=0 class="input_pad descinputoption" value="100" style="width: 40%;margin-bottom:10px;" align="center" />
       </div>
     </div>
     <div id="switchoption" style="display: none">
       <button id="close-btn" class="collapsible" href="javascript:void(0)" onClick="removeField2(this)" style="width:10%;">x</button>
       <button class="collapsible">Switch Selection</button>
       <button id="close-btn" class="collapsible" href="javascript:void(0)" onclick="colla(this)" style="width:10%;">-</button>
       <div class="content" value="switchoption">
         <div class="" style="padding: 10px;margin-bottom: 4px;margin-top: 15px;text-align:center;">
           <select class="fieldFormat" style="">
             <option value="" placeholder"Checkbox style"></option>
             <option value="1">Radio Button (circle)</option>
             <option value="2">Checkbox (circle)</option>
             <option value="5">Checkbox (animated circle)</option>
             <option value="3">Toggle Switch (rectangle)</option>
             <option value="4">Toggle Switch (circle)</option>
           </select>
          </div>
         <div class="switchoption_2" style="margin-top: 15px;">
           <div class="col-xs-12 col-md-12 switchoption_3" style="margin-top: 15px;">
             <label class="scc_label  " style="width: 5%; float: none;">XXYYXX</label>
             <input type="text" placeholder="Selection description" class="input_pad switchinputoption" value="" style="width: 45%;" align="center" required />
             <label class="scc_label  " style="width: 5%; float: none;">Price </label>
             <input type="number" min=0 class="input_pad switchinputoption_2" value="100" style="width: 15%;" align="center" />
           </div>
         </div>
         <div class="col-lg-12 col-md-12 col-xs-12" style="padding: 10px;margin-bottom: 4px;margin-top: 15px;text-align:center;">
           <!-- <select class="fieldFormat" style="">
             <option value="" placeholder"Checkbox style"></option>
             <option value="1">Radio Button (circle)</option>
             <option value="2">Checkbox (circle)</option>
             <option value="5">Checkbox (animated circle)</option>
             <option value="3">Toggle Switch (rectangle)</option>
             <option value="4">Toggle Switch (circle)</option>
           </select> -->
          </div>
          <a href="javascript:void(0)" onClick="addAnotherSwitch(this)" class="crossnadd" style="width:60%; margin-top: 25px;">[+] Add Switch</a>
         <div class="warning"></div>
       </div>
     </div>
     <div id="AsliderOption" style="display: none">
       <button id="close-btn" class="collapsible" href="javascript:void(0)" onClick="removeField2(this)" style="width:10%;">x</button>
       <button class="collapsible">Range Selection</button>
       <button id="close-btn" class="collapsible" href="javascript:void(0)" onclick="colla(this)" style="width:10%;">-</button>
       <div class="content" value="AsliderOption">
         <div class="selslideropt_4">
           <label class="scc_label  col-xs-12 col-md-4" style="margin-top:15px;">Slider Name</label>
           <input type="text" class="col-xs-12 col-md-7 input_pad sliderinputoption_T" style="margin-top:5px;" value="" />
           <div style="clear: both;"></div>
           <div style="padding: 5px; margin:5px;">
             <table class="price_table" cellpadding="0" cellspacing="0" style="width: 100%">
               <caption style="text-align: center;" class="scc_label" style="padding-top:20px;">Price Range</caption>
               <thead>
                 <tr>
                   <th><label class="scc_label  col-xs-12 col-md-4">From</label></th>
                   <th><label class="scc_label  col-xs-12 col-md-4">To</label></th>
                   <th><label class="scc_label  col-xs-12 col-md-4">Price</label></th>
                 </tr>
               </thead>
               <tbody>
                 <tr>
                   <th><input type="number" min=0 class="input_pad sliderinputoption" value="0" style="width: 50%;" align="center" /></th>
                   <th><input type="number" min=0 class="input_pad sliderinputoption_2" value="100" style="width: 50%;" align="center" /></th>
                   <th><input type="number" min=0 class="input_pad sliderinputoption_5" value="1" style="width: 50%;" align="center" /></th>
                   <th>
                     <lable style="width: 10%;font-size: 15px;"></lable>
                   </th>
                 </tr>
               </tbody>
             </table>
           </div>
           <div col-lg-12 col-md-12 col-xs-12 style="text-align:center;">
             <a href="javascript:void(0)" onClick="addNewRange(this)" class="crossnadd material-icons" style="font-size: 15px;">library_add</a>
           </div>
         </div>
       </div>
     </div>
     <div id="selectoption" style="display: none">
       <button id="close-btn" class="collapsible" href="javascript:void(0)" onClick="removeField2(this)" style="width:10%;">x</button>
       <button class="collapsible">Dropdown Selection</button>
       <button id="close-btn" class="collapsible" href="javascript:void(0)" onclick="colla(this)" style="width:10%;">-</button>
       <div class="content" value="selectoption" align="center">
         <div class="selopt5 col-xs-12 col-md-12" style="margin-top:20px;">
 			<label class="scc_label  col-xs-12 col-md-5" style="margin-top:-10px;">Product/Service</label>
			<input type="text" class="col-xs-12 col-md-5 input_pad inputoption_title" style="margin-top:5px;" placeholder="Name">
         </div>
         <hr>
         <div class="selectoption_2 col-xs-12 col-md-12" >
           <div class="selopt3" style="padding-top:10px; margin-bottom: 5px; margin-top:10px;">
             <label class="scc_label1 col-xs-12 col-md-5" style="margin-top:7px;text-align:right;" placeholder="Name">Option XXYYXX: </label>
             <input type="text1" class="col-xs-12 col-md-5 input_pad inputoption" style="margin-top:5px;" placeholder="Name" />

			 <label class="scc_label1 col-xs-12 col-md-5" style="margin-top:7px;text-align:right;" placeholder="Price">Value XXYYXX: </label>
             <input type=" text1" class="col-xs-12 col-md-5 input_pad inputoption_2"  style="margin-top:5px;" placeholder="Price" />

			 <label class="scc_label1 col-xs-12 col-md-5" style="margin-top:7px;text-align:right;" placeholder="Description">Description XXYYXX </label>
             <textarea class="col-xs-12 col-md-5 input_pad inputoption_desc" style="margin-bottom:15px;" > </textarea>

		  </div>
           <div class="warning"></div>
         </div>
         <a href="javascript:void(0)" onClick="addOptiontoSelect(this)" class="crossnadd" style="margin-top:10px;">+ Add Option </a>
       </div>
     </div>
     <li id='form-line' style="display: none">
	   <hr style="padding:1px;margin-top:15px;">
       <div class="BodyOption">
         <label class="scc_label" style="padding-left: 20px;width:30%;text-align:left;">Input Type</label>
         <select onchange="getFieldOptionx(this)" class="getfieldoptionx " style="width:50%;min-width:50%;margin-top:20px;" >
           <option value=""></option>
           <option value="dropdowninput">Dropdown Menu</option>
           <option value="switchinput">Checkbox</option>
           <!-- <option value="addSlider(this)">Combind Slide</option> -->
         </select>
         <div style="clear: both;"></div>
       </div>
     </li>
   <div class="scc_wrapper"><div style="clear: both;" id="previewInputsAdd" class="scc_wrapper"></div></div>
   <div id="scc-demover" data-demo="<?php echo get_option('scc_licensed');?>"></div>
 </div></div>
 <br>
 <!-- ******************************************************* -->
 <div class="col-md-12" style="margin-top:10px;">
   <!--<label class="scc_label col-xs-12 col-md-1" style="text-align: left;"><a class="scc_button" href="javascript:void(0)" onClick="resetFields()">RESET</a></label>-->
   <label class="scc_label col-xs-12 col-md-1" style="text-align: left;"><a class="scc_button" href="javascript:void(0)" onClick="saveFields()">SAVE</a></label>
 </div>
