seajs.config({
    shim:{
        "jquery":{
            "src":"jquery/jquery.min.js"
            , "exports": "jQuery"
        }
        ,"datatables":{
            "src":"jquery.dataTables.min.js"
            , "deps":"jquery"
        }
        , "flot":{
            "src":"jquery.flot.min.js"
            , "deps":"jquery"
        }
        , "pie":{
            "src":"jquery.flot.pie.min.js"
            , "deps":"flot"
        }
        , "gritter":{
            "src":"jquery.gritter.min.js"
            , "deps":"jquery"
        }
        , "peity":{
            "src":"jquery.peity.min.js"
            , "deps":"jquery"
        }
        , "togglebuttons":{
            "src":"jquery.toggle.buttons.html"
            , "deps":"jquery"
        }
        , "uicustom":{
            "src":"jquery.ui.custom.js"
            , "deps":"jquery"
        }
        , "uniform":{
            "src":"jquery.uniform.js"
            , "deps":"jquery"
        }
        , "validate":{
            "src":"jquery.validate.js"
            , "deps":"jquery"
        }
        , "wizard":{
            "src":"jquery.wizard.js"
            , "deps":"jquery"
        }
    },
    alias:{
        "api":"api.js"
    }
});