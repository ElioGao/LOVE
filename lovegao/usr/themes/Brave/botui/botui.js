var botui = new BotUI("botui");
botui.message.bot({
    delay: 200,
    content: "hi，陌生人你好！"
}).then(function () {
    return botui.message.bot({
        delay: 1000,
        content: "我们是西瓜＆小淮！"
    })
}).then(function () {
    return botui.message.bot({
        delay: 1000,
        content: "你想知道什么吗？"
    })
}).then(function () {
    return botui.action.button({
        delay: 1500,
        action: [{
            text: "想听故事",
            value: "xtgs"
        },
            {
                text: "我能做什么？",
                value: "wngs"
            },
            {
                text: "我想走了",
                value: "wxzl"
            }
        ]
    })
}).then(function (res) {
    if (res.value == "xtgs") {
        xtgs();
    }
    if (res.value == "wngs") {
        wngs();
    }
    if (res.value == "wxzl") {
        wxzl();
    }
});

function xtgs() {
    botui.message.bot({
        delay: 1500,
        content: "遇见即是缘分 拥有便是幸运"
    }).then(function () {
        return botui.message.bot({
            delay: 1500,
            content: "我们是在游戏里面认识的（燕云哦！）"
        });
    }).then(function () {
        return botui.message.bot({
            delay: 1500,
            content: "当时还是西瓜想找个徒弟呢嘿嘿"
        });
    }).then(function () {
        return botui.message.bot({
            delay: 1500,
            content: "之后在日常的聊天里面日渐对对方熟悉！"
        });
    }).then(function () {
        return botui.message.bot({
            delay: 1500,
            content: "发现了很多共同点"
        });
    }).then(function () {
        return botui.message.bot({
            delay: 1500,
            content: "我们喜欢相似的音乐风格"
        });
    }).then(function () {
        return botui.message.bot({
            delay: 1500,
            content: "为人处事上也相互认可对方的一些观点"
        });
    }).then(function () {
        return botui.message.bot({
            delay: 1500,
            content: "西瓜有一点人机内向"
        });
    }).then(function () {
        return botui.message.bot({
            delay: 1500,
            content: "而小淮比西瓜要勇敢开朗一点嘿嘿"
        });
    }).then(function () {
        return botui.message.bot({
            delay: 1500,
            content: "我们聊了很多"
        });
    }).then(function () {
        return botui.message.bot({
            delay: 1500,
            content: "也会相互关心对方"
        });
    }).then(function () {
        return botui.message.bot({
            delay: 1500,
            content: "之后用一个词来说叫做"
        });
    }).then(function () {
        return botui.message.bot({
            delay: 1500,
            content: "暗生情愫嘿嘿"
        });
    }).then(function () {
        return botui.message.bot({
            delay: 1500,
            content: "于是，后来……"
        });
    }).then(function () {
        return botui.action.button({
            delay: 1500,
            action: [{
                text: "后来？",
                value: "hl"
            }]
        });
    }).then(function (res) {
        if (res.value == "hl") {
            hl();
        }
    });
}

function hl() {
    botui.message.bot({
        delay: 1500,
        content: "嘿嘿😋后来便是拥有的缘分啦~"
    }).then(function () {
    botui.message.bot({
        delay: 1500,
        content: "PS:还是小淮宝宝表的白呢（西瓜有点胆小嘿嘿）"
    })
        return botui.action.button({
            delay: 1500,
            action: [{
                text: "我能干啥嘞？",
                value: "wngs"
            },
                {
                    text: "我想走了",
                    value: "wxzl"
                }
            ]
        });
    }).then(function (res) {
        if (res.value == "wngs") {
            wngs();
        }
        if (res.value == "wxzl") {
            wxzl();
        }
    });
}

function wngs() {
    botui.message.bot({
        delay: 1500,
        content: "祝福墙：可以写祝福给我们💌"
    }).then(function () {
        return botui.message.bot({
            delay: 1500,
            content: "关于我们：就是你所在的页面🎉"
        });
    }).then(function () {
        return botui.message.bot({
            delay: 1500,
            content: "恋爱清单：我们一起做过的事情！"
        });
    }).then(function () {
        return botui.message.bot({
            delay: 1500,
            content: "相册：可以看到我们记录的甜蜜经历呀"
        });
    }).then(function () {
        return botui.action.button({
            delay: 1500,
            action: [{
                text: "想听故事",
                value: "xtgs"
            },
                {
                    text: "我想走了",
                    value: "wxzl"
                }
            ]
        });
    }).then(function (res) {
        if (res.value == "xtgs") {
            xtgs();
        }
        if (res.value == "wxzl") {
            wxzl();
        }
    });
}

function wxzl() {
    botui.message.bot({
        delay: 1500,
        content: "好哒，欢迎下次光临！Bye~"
    }).then(function () {
        return botui.message.bot({
            delay: 1500,
            content: "本次对话已结束🔚"
        });
    });
}