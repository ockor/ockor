
$("#J_create").click(
    function(){
        var formData = $("form[name=create]").serialize();

        $("#myModal").hide();
        $.post('http://www.ockor.com/admin/sites/store',formData,
            function(callback){
                //location.reload();
            });
    }
);

$(".J_modelBtn").click(function(){
    var id = $(this).data("sid");
    var $form = $("#myModalUpdate form");
    $form.attr('action',$form.attr("action")+"/"+id);
    $.get('http://www.ockor.com/admin/sites/'+id,function(callback){
        $("#myModalUpdate [name=id]").val(callback.id);
        $("#myModalUpdate [name=name]").val(callback.name);
        $("#myModalUpdate [name=url]").val(callback.url);
        $("#myModalUpdate [name=level]").val(callback.level);
        $("#myModalUpdate [name=desc]").val(callback.desc);
        $('#myModalUpdate').modal('show');
    });
    });