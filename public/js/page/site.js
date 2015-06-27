
$("#J_create").click(
    function(){
        var formData = $("form[name=create]").serialize();

        $("#myModal").hide();
        $.post('{{ $urlCreate }}',formData,
            function(callback){
                location.reload();
            });
    }
);


$(".J_delSite").click(
    function(){
        debugger
        var data={}
            , id = $(this).data("sid")
            ,token = $("[name='_token']").value();

        data.id=id;
        data._token = token;
        $.post('http://www.ockor.com/admin/site/destroy',data,function(callback){
            //location.reload();
            console.log(callback);
        });
    }
);



$("#J_createQrCode").click(function(){
    $("#J_showQrCode").attr('src','http://www.ockor.com/qrcode/create?content='+ $.trim($('textarea[name=content]').val()));
});