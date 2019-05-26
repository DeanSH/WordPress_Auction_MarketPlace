var numberOfFields = jQuery('#allinputstoadd .addedFieldsStyle').length;
var numberOfSections = 0;
var numberOfElements = 0;

function loadExample($this) {
  $fragment_refresh = {
    url: rt_vars.rt_urlajax,
    type: 'POST',
    data: {
      action: 'loadExample',
      data_example: jQuery($this).val()
    },
    success: function(data) {
      location.href = rt_vars.rt_adminurl + '?page=edit_sccbyid&id=' + data.trim();
    }
  };
  jQuery.ajax($fragment_refresh);
}

function addSlider($this) {
  console.log(jQuery($this).parent().find('.inputoption_slidchk').is(':checked'));
  if (jQuery($this).parent().find('.inputoption_slidchk').is(':checked'))
  jQuery($this).parent().find('.inputoption_slidchk').attr('checked', false);
  else {
    jQuery($this).parent().find('.inputoption_slidchk').attr('checked', true);
  }
    console.log(jQuery($this).parent().find('.inputoption_slidchk').is(':checked'));
  jQuery($this).parent().parent().parent().parent().find('.selslideropt_3').slideToggle();
}

function AaddSlider($this) {
  jQuery($this).parent().parent().find('.selslideropt_4').slideToggle();
}

function addAnotherSwitch($this) {
  var i = 0;
  jQuery($this).parent().parent().find(' .switchoption_3').each(function() {
    i++;
  });
  jQuery($this).parent().parent().find('.switchoption_2').append(jQuery('#switchoption .switchoption_2').html().replace(/XXYYXX/g, ((i / 1) + 1)));
}

function addAnotherDiscount($this) {

  jQuery($this).parent().parent().find('.switchoption_2').append('<div class="switchoption_3" style="margin-bottom: 5px; margin-top: 5px;"><label class="scc_label col-md-3">&#10080</label> <input placeholder="Name" type="text" class="col-xs-12 col-md-4 input_pad switchinputoption"   /><label class="scc_label " style="">$</label> <input placeholder="Price" type="text" class="col-xs-12 col-md-2 input_pad switchinputoption_2"   /><a href="javascript:void(0)" onClick="remove_field(this)">  &#10062</a></div>');
  // var i = 0;
  // jQuery($this).find('.fieldDatatoAdd .selslideropt_4').each(function() {  i++; } );
  // console.log(i);
  // jQuery($this).parent().parent().find('.fieldDatatoAdd .selslideropt_3').append( jQuery('#AsliderOption .selslideropt_3').html().replace(/XXYYXX/g, (( i / 1) + 1)) );
}

function addNewRange($this) {
  var xmax = parseInt(jQuery($this).parent().parent().find('.price_table .sliderinputoption_2:last').val());
  jQuery($this).parent().parent().find('.price_table').last().append('<tr><th ><input type="number" min=' + (xmax + 1) + ' class="input_pad sliderinputoption" value="' + (xmax + 1) + '"    style="width: 95%;margin-left:12px;"align="center" disabled/></th><th ><input type="number" min=' + (xmax + 2) + ' class="input_pad sliderinputoption_2" value="' + (xmax + 100) + '" style="width: 95%;margin-left:12px;"align="center"/></th><th ><input type="number" min=0 class="input_pad sliderinputoption_5" value=""  style="width: 85%;margin-left:12px;"align="center"/></th><th><a href="javascript:void(0)" class="fa material-icons" onClick="remove_row(this)" style="font-size: 15px;">cancel</a></th></tr>');
}
jQuery("#allinputstoadd .price_table .sliderinputoption_2").change(function() {
  var ind = parseInt(jQuery("#allinputstoadd .price_table .sliderinputoption_2").index(this));
  var maxrange = parseInt(jQuery("#allinputstoadd .price_table .sliderinputoption_2:eq(" + ind + ")").val());
  var minrange = parseInt(jQuery("#allinputstoadd .price_table .sliderinputoption:eq(" + ind + ")").val());
  var maxrange1 = parseInt(jQuery("#allinputstoadd .price_table .sliderinputoption_2:eq(" + (ind + 1) + ")").val());
  if (maxrange1 != NaN) {
    if (maxrange <= minrange) {
      alert("Max must be greater than Min");
      jQuery("#allinputstoadd .price_table .sliderinputoption_2:eq(" + (ind) + ")").val(minrange + 100);
      jQuery("#allinputstoadd .price_table .sliderinputoption:eq(" + (ind + 1) + ")").val(minrange + 101);
    } else
      jQuery("#allinputstoadd .price_table .sliderinputoption:eq(" + (ind + 1) + ")").val(maxrange + 1);
  }
});

function remove_row($this) {
  var maxrange = jQuery($this).parent().parent().next().find('.sliderinputoption_2').val();
  var maxrange1 = parseInt(jQuery($this).parent().parent().prev().find('.sliderinputoption_2').val());
  if (maxrange != undefined)
    jQuery($this).parent().parent().next().find('.sliderinputoption').val((maxrange1 + 1));
  jQuery($this).parent().parent().remove();
}

function remove_field($this) {
  jQuery($this).parent('div').remove();
}

function addOptiontoSlider($this) {
  var i = 0;
  jQuery($this).parent().parent().parent().find('.fieldDatatoAdd .selslideropt_2 .selslideropt_3').each(function() {
    i++;
  })
  jQuery($this).parent().parent().parent().find('.fieldDatatoAdd .selslideropt_2').append("<hr />" + jQuery('#sliderOption .selslideropt_2').html().replace(/XXYYXX/g, ((i / 1) + 1)));
}

function addaOptiontoSlider($this) {
  var i = 0;
  // console.log(jQuery($this).parent().parent().parent().parent().find('.fieldDatatoAdd .selslideropt_2').get());
  //        jQuery($this).parent().parent().parent().find('.fieldDatatoAdd .selslideropt_2').append("<div Class=Test>");
  jQuery($this).parent().parent().parent().find('.fieldDatatoAdd .selslideropt_2 .selslideropt_3').each(function() {
    i++;
  })
  jQuery($this).parent().parent().parent().find('.fieldDatatoAdd .selslideropt_2').append(" <hr />" + jQuery('#AsliderOption .selslideropt_2').html().replace(/XXYYXX/g, ((i / 1) + 1)));
} //.replace(/hide1/g, "hide"+(i + 1)) );
function addOptiontoSelect($this) {
  var i = 0;
  jQuery($this).parent().parent().find('.content .selectoption_2 .selopt3').each(function() {
    i++;
  })
  jQuery($this).parent().parent().find('.content .selectoption_2').append(jQuery('#selectoption .selectoption_2').html().replace(/XXYYXX/g, (i + 1)));
}

function fieldItems(fieldFormat, name, description, type, sevoptions) //used for the main item
{
  this.name = name;
  this.description = description;
  this.type = type;
  this.typeFormat = fieldFormat;
  this.allOptions = sevoptions;
}

function getFieldOptionx($f) {
  var fieldOpt = jQuery($f).val(); //we fetch the HTML using the IDs:
  var fieldStyle = jQuery($f).parent().parent().parent().find('.fieldstyle');
  switch (fieldOpt) {
    case "titledesc":
      fieldOpt = jQuery('#titledescdiv').html();
      fieldStyle.html('');
      break;
    case "sliderinput":
      fieldOpt = jQuery('#sliderOption').html();
      fieldStyle.html('');
      break;
    case "Asliderinput":
      fieldOpt = jQuery('#AsliderOption').html();
      fieldStyle.html('');
      break;
    case "switchinput":
      fieldOpt = jQuery('#switchoption').html().replace(/XXYYXX/g, 1);
      //                fieldStyle.html(jQuery('#checkboxstyle').html());
      break;
    case "dropdowninput":
      fieldOpt = jQuery('#selectoption').html().replace(/XXYYXX/g, 1);
      fieldStyle.html('');
      break;
    default:
      fieldOpt = jQuery('#inputoptiontext').html();
      fieldStyle.html('');
  }
  jQuery($f).parent().html(fieldOpt);
}

function dropDownOptions(name, value, description, sliderChecked, slide_name, slidoption_1, slidoption_2, slidoption_3, slidoption_4, slidoption_5) //used for option-value pairs (select)
{
  this.name = name;
  this.value = value;
  this.description = description; //description will be null for checkboxes
  this.sliderChecked = sliderChecked;
  if (sliderChecked) {
    this.slidename = slide_name;
    this.slidoption_1 = slidoption_1;
    this.slidoption_2 = slidoption_2;
    this.slidoption_3 = slidoption_3;
    this.slidoption_4 = slidoption_4;
    this.slidoption_5 = slidoption_5;
  }
}

// function inputoptions(name, value, description) //used for option-value pairs (select)
// {
//   this.name = name;
//   this.value = value;
//   this.description = description; //description will be null for checkboxes
// }

function discountoptions(min, max, newprice) //used for option-value pairs (select)
{
  this.min = min;
  this.max = max;
  this.newprice = newprice;
}

function ElementArray(No, title, name, value1, value2) {
  this.No = No;
  this.title = title;
  this.name = name;
  this.value1 = value1;
  this.value2 = value2;
}
function InputOptions (element,type,value,length){
  this.element = element;
  this.type = type;
  this.value = value;
  this.length = length;
}

function titleDescOption(title, description) {
  this.title = title;
  this.description = description;
} //used for the text option
function oneOption(value) {
  this.value = value;
} //used for the text option

function previewDropDown($this) {
  var fieldDesc = jQuery($this).find('.fieldDescription').val();
  var fieldName = jQuery($this).find('.fieldServiceName').val();
  var theHTML = (fieldName != '') ? "<div><label>" + fieldName + "</label>" : '<div>';
  theHTML += (fieldDesc != '') ? "<div>" + fieldDesc + "</div>" : '';
  theHTML += '<select>';
  jQuery($this).find('.selectoption_2').find('.selopt3').each(function() {
    theHTML += "<option value='" + jQuery(this).find('.inputoption_2').val() + "'>" + jQuery(this).find('.inputoption').val() + "</option>";
  });
  theHTML += '</select></div><br />';
  return theHTML;
}

function previewFields() {
  var previewhtml = '';
  jQuery('#allinputstoadd .addedFieldsStyle').each(function() {
    var geptionx = jQuery(this).find('.getfieldoptionx').val();
    if ('dropdowninput' == geptionx) {
      previewhtml += previewDropDown(this);
    } else if ('switchinput' == geptionx) {
      previewhtml += previewSwitch(this);
    } else if ('sliderinput' == geptionx) {
      previewhtml += previewSlider(this);
    }
  });
  jQuery('#previewInputsAdd').html("<hr /><br />" + previewhtml);
}

function fieldsToEdit(fields) {
  numberOfFields = fields;
}

function wait(ms) {
  var start = new Date().getTime();
  var end = start;
  while (end < start + ms) {
    end = new Date().getTime();
  }
}

function addAnotherField() {
  numberOfFields = jQuery('#allinputstoadd .addedFieldsStyle').length;
  demo = jQuery('#scc-demover').attr('data-demo');
  console.log(demo);
  // Add 2 Sections for demo...
  if (demo == 0 && numberOfFields > 1) {
    jQuery('#scc-demover').html('You cannot add more than five items. Purchase the pro version <a href="https://designful.ca/apps/stylish-cost-calculator-wordpress/">here</a> for $20 today!').fadeIn();
    jQuery('.hover_bkgr_fricc').show();
    return;
  } else {
    jQuery('#scc-demover').html('').fadeOut();
  }
  // jQuery('#wpfooter').fadeOut();console.log(numberOfFields);
  // if (numberOfFields != 1)
  // {
  //      jQuery('.down:eq('+(numberOfFields-2)+')').css("display", "block");
  // }
  var theOpt = jQuery('#inputtoadd').html();
  jQuery('#allinputstoadd').append(theOpt);
  resort_updown();
  jQuery('.getfieldoptionx').click(function() {
    var fieldOpt = jQuery(this).val();
    secondStep(this, fieldOpt, 'ascend')
  });
}

function addAnotherElement($this) {
  //numberOfElements++;
  demo = jQuery('#scc-demover').attr('data-demo');
  console.log(demo);
  var xnumberOfFields = jQuery('#allinputstoadd .boardOption').length;
  if(xnumberOfFields == 0){
      jQuery('.speech-bubble').show();
  }

  // Add only 2 Subsection for demo
  if (demo == 0 && xnumberOfFields > 1) {
    jQuery('#scc-demover').html('You cannot add more than five items. Purchase the pro version <a href="https://designful.ca/apps/stylish-cost-calculator-wordpress/">here</a> for $20 today!').fadeIn();
    jQuery('.hover_bkgr_fricc').show();
    return;
  } else {
    var thh = jQuery($this).parent().parent().parent().parent().find('.fieldDatatoAdd');
    var theOpt = jQuery('#fieldDatatoAdd').html();
    var theOpt1 = jQuery('#fieldDatatoAdd11').html();
    // jQuery($this).parent().parent().parent().find('.boardOption1').html(theOpt1);
    // thh.append(theOpt);
    jQuery($this).parent().parent().parent().find('.boardOption1').remove();
    thh.append(theOpt1+ theOpt);
  }
}
function addAnotherElement1($this) {
  var theOpt = jQuery('#fieldDatatoAdd').html();
  var theOpt1 = jQuery('#fieldDatatoAdd11').html();
  jQuery($this).find('.boardOption1').remove();
  jQuery($this).find('.fieldDatatoAdd').append(theOpt1+theOpt);
}

function addAnotherOption($this) {
  numberOfSections=jQuery('#allinputstoadd .BodyOption').length;
  demo = jQuery('#scc-demover').attr('data-demo');
  console.log(demo);
  // Add only 5 items for demo.
  if (demo == 0 && numberOfSections > 6) {
    jQuery('#scc-demover').html('You cannot add more than five items. Purchase the pro version <a href="https://designful.ca/apps/stylish-cost-calculator-wordpress/">here</a> for $20 today!').fadeIn();
    jQuery('.hover_bkgr_fricc').show();
    return;
  } else {
    var theOpt = jQuery('#form-line').html();
    jQuery($this).parent().parent().find('.form-line').append(theOpt);
    // resort_updown();
    // jQuery('.getfieldoptionx').click(function()
    // {
    //     var fieldOpt = jQuery(this).val();
    //     secondStep(this, fieldOpt, 'ascend')
    // });
  }
}

function previewSlider($this) {
  var theHTML = '<div>';
  var fieldServiceName = jQuery($this).find('.fieldServiceName').val();
  var fieldDescription = jQuery($this).find('.fieldDescription').val();
  var min = jQuery($this).find('.inputoption').val();
  var max = jQuery($this).find('.inputoption_2').val();
  var step = jQuery($this).find('.inputoption_3').val();
  var defaultValue = jQuery($this).find('.inputoption_4').val();
  theHTML += '<label>' + fieldServiceName + '</label>';
  theHTML += '<div class="slidecontainer"  style="clear: both;">';
  theHTML += '<input data-inputtype="slider" type="range" min="' + min + '" max="' + max + '" step="' + step + '" value="' + defaultValue + '" class="slider itemCreated">';
  theHTML += '</div></div><div style="clear: both;"></div><br /><br />';
  return theHTML;
}

function previewSwitch($this) {
  var fieldDesc = jQuery($this).find('.fieldDescription').val();
  var fieldName = jQuery($this).find('.fieldServiceName').val();
  var price = jQuery($this).find('.inputoption').val();

  var theHTML = (fieldName != '') ? "<div><label>" + fieldName + "</label>" : '<div>';
  theHTML += '<label class="switch">';
  theHTML += '<input type="checkbox" data-toggle="toggle" checked datainputprice="' + price + '" data-inputtype="switch" class="itemCreated">';
  theHTML += '<span class="slider_switch round"></span>';
  theHTML += '</label><div style="clear: both;"></div><br /><br />';
  return theHTML;
}

function removeField($f) {
  numberOfFields--;
  jQuery($f).parent().parent().parent().remove();
  resort_updown();
}

function removeField1($f) {
  numberOfElements--;
  jQuery($f).parent().parent().remove();
  resort_updown();
}
function removeField2($f) {
  numberOfSections--;
  jQuery($f).parent().remove();
  resort_updown();
}

function colla($this) {
  var siggn = jQuery($this).text() == "-" ? "+" : "-";
  jQuery($this).text(siggn);
  jQuery($this).parent().find('.content').slideToggle(200);
}

function resetFields() {
  jQuery('#allinputstoadd').html('');
  jQuery('#previewInputsAdd').html('');
}

function saveFields() {
  var fieldName = jQuery('#costcalculatorname').val();
  if (fieldName.trim() == '')
  {
      jQuery('#themainwarning').html('Calculator must have a name');
      return;
  } else { jQuery('#themainwarning').html(''); }


  var fontType = jQuery("#scc_fonttype").val().trim();
  var colorPicker = jQuery("#colorPicker").val();
  var servicepricefontsize = jQuery('#servicepricefontsize').val();

  var title_fontType = jQuery("#titlescc_fonttype").val().trim();
  var title_colorPicker = jQuery("#titlecolorPicker").val();
  var title_servicepricefontsize = jQuery('#titlepricefontsize').val();
  //var fontType = jQuery("#scc_fonttype").val();
  var objectColorPicker = jQuery("#objectcolorPicker").val();
  var objectServicepricefontsize = jQuery('#objectservicepricefontsize').val();

  var adminsettingsid = jQuery('#adminsettingsid').attr('data-calculator_id');
  // var costcalculatordescription = jQuery('#costcalculatordescription').val();

  var fieldstosend = [['name', 'description']];

  var a = 0;
  var switchError = false;
  var sliderError = false;
  var asliderError = false;
  var dropdownError = false;
  var textInputError = false;

  var section = 0;
  var a = 0;
  var SectionName = [];
  var elementOption = 0;


  jQuery('#allinputstoadd .addedFieldsStyle').each(function() {
    var sliderChecked = 0;
    var elementOption = jQuery(this).find('.boardOption').length;
    if (elementOption != 0) {
      var elementNo = 0;
      var allfieldOptions2 = [];
      jQuery(this).find('.boardOption').each(function(){
        var allfieldOptions = [];
        var is = 0;
        jQuery(this).find('.BodyOption').each(function() {
        var count = 0;
        var allfieldOptions1 = [];
        var fieldType = jQuery(this).find('.content').attr('value');
        switch (fieldType) {
          // case "titledescdiv":
          //   allfieldOptions1[count] = new ElementArray(count, 0, jQuery(this).find('.titleinputoption').val(), jQuery(this).find('.descinputoption').val(), 0);
          //   count++;
          //   allfieldOptions[is] = new InputOptions (is,fieldType,allfieldOptions1,count);
          //   is++;
          //   break;
          // case "AsliderOption":
          //   var fieldServiceName = jQuery(this).find('.sliderinputoption_T').val();
          //   var s_length = jQuery(this).find('.price_table tbody tr').length;
          //   jQuery(this).find('.price_table tbody tr').each(function() {
          //     allfieldOptions1[count] = new ElementArray(count, fieldServiceName, jQuery(this).find('.sliderinputoption').val(), jQuery(this).find('.sliderinputoption_2').val(), jQuery(this).find('.sliderinputoption_5').val());
          //     count++;
          //   });
          //   allfieldOptions[is] = new InputOptions (is,fieldType,allfieldOptions1,s_length);
          //   is++;
          //   break;
          case "switchoption":
            var s_length = jQuery(this).find('.switchoption_3').length;
            var s_type = jQuery(this).find('.fieldFormat').val();
            jQuery(this).find('.switchoption_3').each(function() {
              switchError = validateSwitch(jQuery(this).parent().parent(), jQuery(this).find('.switchinputoption').val(), jQuery(this).find('.switchinputoption_2').val());
              if (switchError === true) {
                return;
              }
              allfieldOptions1[count] = new ElementArray(count, 0, jQuery(this).find('.switchinputoption').val(), jQuery(this).find('.switchinputoption_2').val(), s_type);
              count++;
            });
            allfieldOptions[is] = new InputOptions (is,fieldType,allfieldOptions1,s_length);
            is++;
            break;
          case "selectoption":
            var fieldDropServiceName = jQuery(this).find('.inputoption_title').val(); //inputoption_title
            var s_length = jQuery(this).find('.selopt3').length;
            var $thisDropDown = this; //inside the each loop, this will have a different value
            jQuery(this).find('.selopt3').each(function() {
              dropdownError = validateDropDown(fieldDropServiceName, $thisDropDown, jQuery(this).find('.inputoption').val(), jQuery(this).find('.inputoption_2').val());
              if (dropdownError === true) {
                return;
              }
              allfieldOptions1[count] = new ElementArray(count, fieldDropServiceName, jQuery(this).find('.inputoption').val(), jQuery(this).find('.inputoption_2').val(), jQuery(this).find('.inputoption_desc').val());
              count++;
            });
            allfieldOptions[is] = new InputOptions (is,fieldType,allfieldOptions1,s_length);
            is++;
            break;
          default:
            console.log(a, "5");
        }
      });

//      console.log(jQuery(this).find('.inputoption_slidchk'));
      console.log(jQuery(this).find('.inputoption_slidchk').is(':checked'));
      if (jQuery(this).find('.inputoption_slidchk').is(':checked')) {
        sliderChecked = 1; var allfieldOptions3=[];
        var fieldServiceName = jQuery(this).find('.sliderinputoption_T').val();
        var s_length = jQuery(this).find('.price_table tbody tr').length;
        var ktable=0;
        jQuery(this).find('.price_table tbody tr').each(function() {
          allfieldOptions3[ktable] = new ElementArray(ktable, fieldServiceName, jQuery(this).find('.sliderinputoption').val(), jQuery(this).find('.sliderinputoption_2').val(), jQuery(this).find('.sliderinputoption_5').val());
          ktable++;
        });
        var step = jQuery(this).find('.slidoption_3').val();
        var defaultValue = jQuery(this).find('.slidoption_4').val();
        allfieldOptions2[elementNo] = new SubOptions(elementNo,allfieldOptions, allfieldOptions3, step, defaultValue);
      }
      else {
        sliderChecked = 0;
        allfieldOptions3 = [];
        allfieldOptions2[elementNo] = new SubOptions(elementNo, allfieldOptions, allfieldOptions3, 0, 0);
      }
      elementNo++;
    });
//         console.log(allfieldOptions2);
    }
    else {
          var allfieldOptions2 = [];
      }
      SectionName[a] = new sliderOptions(jQuery(this).find('.sectiontitle').val(),jQuery(this).find('.sectionDescription').val(),a,allfieldOptions2);
      a++;
  });
   console.log(SectionName);
   if(!switchError || !dropdownError){
     $fragment_refresh = {
                     url: rt_vars.rt_urlajax,
                     type: 'POST', //jQuery('#previewInputsAdd').html().trim()
                     data: { action: 'sccSaveField', objectColorPicker: objectColorPicker, objectServicepricefontsize: objectServicepricefontsize, title_fontType: title_fontType, title_colorPicker: title_colorPicker, title_servicepricefontsize: title_servicepricefontsize,
                            fontType: fontType.toString(), colorPicker: colorPicker, servicepricefontsize: servicepricefontsize, adminsettingsid: adminsettingsid, fieldname: fieldName, fieldPreview: JSON.stringify(SectionName), fieldform: btoa(JSON.stringify(jQuery('#allinputstoadd').html().trim()))},
                     success: function( data )
                     {
                       location.href = rt_vars.rt_adminurl + '?page=edit_sccbyid&id=' + data.trim();
                     }
             };
     jQuery.ajax( $fragment_refresh );
   }
}

function secondStep($this, fieldOpt, ascdesc) {
  switch (fieldOpt) {
    case "sliderinput":
      fieldOpt = jQuery('#sliderOption').html().replace(/XXYYXX/g, 1);
      break;
    case "Asliderinput":
      fieldOpt = jQuery('#AsliderOption').html().replace(/XXYYXX/g, 1);
      break;
    case "switchinput":
      fieldOpt = jQuery('#switchoption').html().replace(/XXYYXX/g, 1);
      break;
    case "dropdowninput":
      fieldOpt = jQuery('#selectoption').html().replace(/ XXYYXX/g, 1);
      break;
    default:
      fieldOpt = jQuery('#inputoption').html();
  }
  if (ascdesc == 'ascend') {
    jQuery($this).parent().parent().parent().find('.fieldDatatoAdd').html(fieldOpt);
  } else if (ascdesc == 'descend') jQuery($this).find('.fieldDatatoAdd').html(fieldOpt);
}

function sliderOptions(name, desc, section, value) {
  this.name = name;
  this.desc = desc;
  this.section = section;
  this.value = value;
}

function SubOptions(subsection, Nooptions, minmax, step, defaultValue) {
  this.subsection = subsection;
  this.Nooptions = Nooptions;
  this.minmax = minmax;
  this.step = step;
  this.defaultValue = defaultValue;
}

function sliderOptions1(name, step, defaultValue, discount, ndiscount) {
  this.name = name;
  // this.min = min;
  // this.max = max;
  this.step = step;
  this.defaultValue = defaultValue;
  // this.multiplier = multiplier;
  this.discount = discount;
  this.ndiscount = ndiscount;
}

function validateTextInput(fieldInputName, $this, textInputVar) {
  jQuery($this).find('.warning').html('');
  if (fieldInputName.trim() == '') {
    jQuery($this).find('.warning').html('Product/Service name cannot be empty');
    return;
  }
  if (textInputVar.trim() == '' || isNaN(textInputVar)) {
    jQuery($this).find('.warning').html('Error - Price Value is not numeric');
    return true;
  }
  return false;
}

function validateDropDown(fieldDropServiceName, $this, value_1, value_2) {
  jQuery($this).find('.warning').html('');
  /*if (fieldDropServiceName.trim() == '')
  {
      jQuery($this).find('.warning').html('Product/Service name cannot be empty');
      return;
  }
  if (value_1 == '' && value_2 == '')
  {
      jQuery($this).find('.warning').html(''); return;
  }*/
  if (value_1 == '') {
    jQuery($this).find('.warning').html('One of the names is empty');
    return true;
  }
  if (value_2 == '' || isNaN(value_2)) {
    jQuery($this).find('.warning').html('Error - price values must be numeric');
    return true;
  }
  return false;
}

function validateSwitch($this, value_1, value_2) {
  jQuery($this).find('.warning').html('');
  if (value_1 == '') {
    jQuery($this).find('.warning').html('One of the names is empty');
    return true;
  }
  if (value_2.trim() == '' || isNaN(value_2)) {
    jQuery($this).find('.warning').html('Error - price values must be numeric');
    return true;
  }
  return false;
}

function validateSlider($this, fieldName) {
  if (fieldName.trim() == '') {
    jQuery($this).find('.warning').html('Product/Service name cannot be empty');
    return;
  }
  var min = jQuery($this).find('.inputoption').val();
  if (min.trim() == '' || isNaN(min)) {
    jQuery($this).find('.warning').html('Minimum value is not numeric');
    return true;
  }

  var max = jQuery($this).find('.sliderinputoption_2').val();
  if (max.trim() == '' || isNaN(max)) {
    jQuery($this).find('.warning').html('Maximum value is not numeric');
    return true;
  }

  var step = jQuery($this).find('.inputoption_3').val();
  if (step.trim() == '' || isNaN(step)) {
    jQuery($this).find('.warning').html('Step value is not numeric');
    return true;
  }

  var defaultValue = jQuery($this).find('.inputoption_4').val();
  if (defaultValue.trim() == '' || isNaN(defaultValue)) {
    jQuery($this).find('.warning').html('Default value is not numeric');
    return true;
  }

  if (parseInt(defaultValue) < parseInt(min) || parseInt(defaultValue) > parseInt(max)) {
    jQuery($this).find('.warning').html('Default Value cannot be greater than the maximum value, or smaller than the minimum value');
    return true;
  }

  if (parseInt(min) >= parseInt(max)) {
    jQuery($this).find('.warning').html('Minimum value has to be smaller than the maximum value');
    return true;
  }

  if (parseInt(step) >= parseInt(max)) {
    jQuery($this).find('.warning').html('Step Value cannot be more than the maximum value');
    return true;
  }

  jQuery($this).find('.warning').html('');
  return false;
}

function resort_updown() {
  jQuery('#allinputstoadd .down:last').css("display", "none");
  jQuery('#allinputstoadd .up:first').css("display", "none");
  jQuery('#allinputstoadd .down').not(':last').css("display", "block");
  jQuery('#allinputstoadd .up').not(':first').css("display", "block");
  jQuery('#allinputstoadd .fieldDatatoAdd .sdown:last-child').css("display", "none");
  jQuery('#allinputstoadd .fieldDatatoAdd .sup:first-child').css("display", "none");
  jQuery('#allinputstoadd .fieldDatatoAdd .sdown').not(':last').css("display", "block");
  jQuery('#allinputstoadd .fieldDatatoAdd .sup').not(':first').css("display", "block");
}

function remove_field($this) {
  jQuery($this).parent('div').remove();
}

function rup($this) {
  var wrapper = jQuery($this).parent().parent().parent(); //.closest('div');
  wrapper.insertBefore(wrapper.prev());
  resort_updown();
}

function rdown($this) {
  var wrapper = jQuery($this).parent().parent().parent(); //.closest('div');
  wrapper.insertAfter(wrapper.next());
  resort_updown();
}
function ClosePopup(){
  jQuery('.hover_bkgr_fricc').hide();
}

function ClosePopup1(){
  jQuery('.speech-bubble').hide();
}

function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
