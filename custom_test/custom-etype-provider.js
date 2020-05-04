var customElementTypeProvider = (function () {
    return function (options) {

        var addElementTypes = function (context) {
            context.addPrintElementTypes(
                "testModule",
                [
                    new hiprint.PrintElementTypeGroup("常规", [
                        { tid: 'testModule.text', text: '文本', "options": {
                            "textAlign": "center", "title":"","field":"","testData":"text","textType": 'text',"fontFamily":"Microsoft YaHei",
                            }},
                        {tid:"testModule.image",text: '图片', type: 'image', "options":{"field":"","src":"logo.png"}},
                        {tid: 'testModule.qrcode', text: '二维码',"options": {
                            "height": 50,"width": 50,"title":"JMW-power","field":"","testData":"qrcode","textType": "qrcode"
                            }},
                        {tid: 'testModule.barcode', text: '条形码', "options": {
                            "width": 150, "height": 35,"textAlign": "center", "title":"JMW-power","field":"","testData":"barcode","textType": 'barcode',"fontFamily":"Microsoft YaHei",
                            }}
                    ]),
                    new hiprint.PrintElementTypeGroup("辅助", [
                        {
                            tid: 'testModule.hline',
                            text: '横线',
                            type: 'hline'
                        },
                        {
                            tid: 'testModule.vline',
                            text: '竖线',
                            type: 'vline'
                        },
                        {
                            tid: 'testModule.rect',
                            text: '矩形',
                            type: 'rect'
                        },
                        {
                            tid: 'testModule.oval',
                            text: '椭圆',
                            type: 'oval'
                        }
                    ])
                ]
            );
        };

        return {
            addElementTypes: addElementTypes
        };

    };
})();