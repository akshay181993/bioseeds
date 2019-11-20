var length = 0;
var length1 = 0;
function addnewrow(id)
    {
        var url = $("#url").val();
        var length = $(".rowcount").length+1;
        // var length1 = $(".rowcount1").length+1;
        // var length2 = $(".rowcount2").length+1;
        // alert(length);
        if(id == "profile_imagerow"){
            $("#"+id).append('<div class="form-group rowcount dynamic_col'+length+'"><label class="col-md-2 control-label">Image</label><div class="col-md-8"><div class="input-group"><span class="input-group-addon"><i class="fa fa-file-image-o"></i></span><input type="file" class="form-control1" name="success_image[]" id="success_image'+length+'" onchange="ImageUpload(\'' + url +'\',\'success_image'+length+'\',\'' + length +'\')" required><input type="hidden" name="simage[]" id="simage'+length+'"></div></div><div class="col-md-2"><div class="input-group"><button type="button" class="btn btn-danger deleterow" id="length'+length+'" onclick="RemoveRow(\'' + length +'\',\'remove_row\')"><i class="fa fa-times"></i> Remove</button></div></div></div>');
        }

        // if(id == "prod_variety"){
        //     $("#"+id).append('<div class="form-group rowcount1 dynamic_col1'+length1+'"><label class="col-md-2 control-label">Product Variety</label><div class="col-md-8"><div class="input-group"><span class="input-group-addon"><i class="fa fa-list-ul"></i></span><input type="text" class="form-control1" placeholder="Product Variety" name="product_variety[]" id="product_variety'+length1+'"></div></div><div class="col-md-2"><div class="input-group"><button type="button" class="btn btn-danger delete_variety" onclick="RemoveRow(\'' + length1 +'\',\'remove_varietyrow\')"><i class="fa fa-times"></i> Remove</button></div></div></div>');

        // }

        // if(id == "variety_imagerow"){
        //     $("#"+id).append('<div class="form-group rowcount2 dynamic_col2'+length2+'"><label class="col-md-2 control-label">Variety Image</label><div class="col-md-8"><div class="input-group"><span class="input-group-addon"><i class="fa fa-file-image-o"></i></span><input type="file" class="form-control1" name="varity_image[]" id="varity_image'+length2+'" onchange="ImageUpload(\'' + url +'\',\'varity_image'+length2+'\',\'' + length2 +'\')" required><input type="hidden" name="vimage[]" id="vimage'+length2+'"></div></div><div class="col-md-2"><div class="input-group"><button type="button" class="btn btn-danger deletevimgrow" id="vimagerowlength'+length2+'" onclick="RemoveRow(\'' + length2 +'\',\'remove_varietyimgrow\')"><i class="fa fa-times"></i> Remove</button></div></div></div>');
        // }              

    }

function RemoveRow(length,id)
    {
        // alert('hi');
        if(id == 'remove_row'){
            $(".dynamic_col"+length).remove();
            $(".deleterow"+length).remove();
            $(".deleteimg"+length).remove();
            $(".success_img_row"+length).remove();
        }
    }
function ImageUpload(url,id,length=""){
	
		var file_data = $('#'+id).prop('files')[0];
		// alert(length);
        var form_data = new FormData();
        form_data.append("file", file_data);        
        $.ajax({
            async:true,
            dataType:"json",
            url: url+'image_upload',
            type:'post',
            data: form_data,
            enctype:"multipart/form-data",
            cache: false,
            processData: false,
            contentType: false,
            success: function (data) {
            	// console.log(data);
            	if(id == 'category_image1'){
            		$('#editimage').val(data);
            	}

            	if(id == "product_image" ){
            		$("#pimage").val(data);
            	}

            	if(id == 'category_image'){
            		$('#image').val(data);
            	}

            	if (id == "cultivation_manual") {
            		$('#cultivation_manual1').val(data);
            	}

                if (id == "cultivation_manual2") {
                    $('#cultivation_manual_hindi').val(data);
                }

                if (id == "news_image") {
                    $('#nimage').val(data);
                }

                if (id == "success_image"+length) {
                    $('#simage'+length).val(data);
                }

                if (id == "varity_image") {
                    $('#vimage').val(data);
                }
        },

    });
}

function addCategory(url,routes){
	$.ajax({
		type: 'POST',
        url: url+routes,
        data:   $("#addcategory_form").serializeArray(),
        enctype:"multipart/form-data",
        success: function(data) {
            	// console.log(data);
            	var result = $.parseJSON(data);
            	$('.category_errors').empty();
               	if(result == "success"){
               		setTimeout(function() {
					    location.reload();
					}, 2000);
                	$('#category_modal').hide();
                	$('body').removeClass('modal-open');
 					$(".modal-backdrop").remove();
 					$(".display_success").css("display","block");
	                $(".display").css("display","none");
               		$('.success').append('Category Saved Successfully');
               }else{		
		            $(".display").css("display","block");
		            $('.category_errors').append(result["category_name"]);
		            $('.category_errors').append(result["image"]);
                    $('.category_errors').append(result["category_name_hindi"]);
               }
        },
        error: function(xhr, status, error) {
            /*error message*/
            $(".category_errors").append("Something Went Wrong");
        }, 
    });
}
// to show data on update
 $(document).on('click','.editcategory',function(){
 	var baseurl = $(this).attr("data-url");
    var url = baseurl+"show_category";
    var category_id= $(this).attr("data-id");
    $.get(url + '/' + category_id, function (data) {
    	var result = $.parseJSON(data);
        $('#editcategory_id').val(result[0].id);
        $('#editcategory_name').val(result[0].name);
        $('#editcategory_name_hindi').val(result[0].hi_category_name);
        $('#editcategory_img').attr("src", baseurl+'public/uploads/cat_image/'+result[0].img_path);
        $('#editimage').val(result[0].img_path);
    }) 
});
// end here
function UpdateCategory(url,routes){
	$.ajax({
		type: 'POST',
        url: url+routes,
        data:   $("#editcategory_form").serializeArray(),
        enctype:"multipart/form-data",
        success: function(data) {
            	// console.log(data);
            	var result = $.parseJSON(data);
            	$('.category_errors').empty();
               	if(result == "success"){
               		setTimeout(function() {
					    location.reload();
					}, 2000);
                	$('#editcategory_modal').hide();
                	$('body').removeClass('modal-open');
 					$(".modal-backdrop").remove();
 					$(".display_success").css("display","block");
	                $(".display").css("display","none");
               		$('.success').append('Category Updated Successfully');
               }else{		
		            $(".display").css("display","block");
		            $('.category_errors').append(result["editcategory_name"]);
		            $('.category_errors').append(result["editimage"]);
                    $('.category_errors').append(result["editcategory_name_hindi"]);

               }
        },
        error: function(xhr, status, error) {
            /*error message*/
            $(".category_errors").append("Something Went Wrong");
        }, 
    });
}

function Status_update(url,id,name,model)
{
	 var id = id;
	 var name = name;
	 $.ajax({ 
        type: 'post',
        url: url+'all_status/'+id+'/'+model,
        data:{
                id:id,
                name:name,
                model:model
            },
        success: function(data) {
            var result = $.parseJSON(data);
            if(result == 'success'){
            	setTimeout(function() {
					    location.reload();
					}, 2000);
                // $('#'+id).remove();
 				$(".display_success").css("display","block");
               	$('.success').append('Status Updated Successfully');
            }
        }, 
        error: function(xhr, status, error) {
            $(".category_errors").append("Something Went Wrong");
        }, 
    });
}

// Common delete for everything
function DeleteAll(url,id,name,imgpath="")
{
     var id = id;
     $.ajax({ 
        type: 'post',
        url: url+'all_delete/'+id+'/'+name,
        data:{
                id:id,
                name:name,
                imgpath:imgpath
            },
        success: function(data) {
            var result = $.parseJSON(data);
            if(result == 'success'){
                setTimeout(function() {
                        location.reload();
                    }, 2000);
                $('#'+id).remove();
                $(".display_success").css("display","block");
                $('.success').append('Data Deleted Successfully');
            }
        }, 
        error: function(xhr, status, error) {
            $(".success").append("Something Went Wrong");
        }, 
    });
}

// end here

$(document).ready(function(){
   notify_count(); 
});

function notify_count()
{
    var baseurl = $("#base_url").val();
    var url = baseurl+"new_enquiry";
    $.get(url, function (data) {
        var result = $.parseJSON(data);
        if(result != false){
            var count = result.length;
            $(".notify_count").text(count);
            var i,showdate = "";
            for (i = 0; i < 5; i++) {
                showdate = new Date(result[i].created_at).toString().split(' ').slice(0,4).join(' ');
                $("#notification_data li").eq(0).append('<li><a href="javascript:void(0)"><div class="notification_desc" onclick="change_status(\'' + baseurl +'\',\'' + result[i].id +'\')"><p class="enquiry_name">'+result[i].name+'</p><p class="enquiry_time"><span>'+showdate+'</span></p></div><div class="clearfix"></div></a></li>');
            }
        }
    });
}

function change_status(url,id)
{
    $.ajax({
        type:'POST',
        url:url+"enquiry_status",
        dataType:'json',
        data:{id:id},
        success:function(data){
            window.location.href = url+"enquiry_list";
        }
    });
}