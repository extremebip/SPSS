Vue.component('info-row', {
    props: ['info', 'val'],
    data: function() {
        return {
            buttonStyle: {
                position: 'absolute',
                right: '0.2em',
                top: '-1em',
            },
            valueStyle: {
                cursor: 'pointer'
            },
            hover: false,
            active: {
                backgroundColor: '#c6c3ff',
                borderRadius: '20px',
                fontWeight: 'bolder',
            },
            rowStyle: {
                padding: '1em 0',
                fontSize: '1.1em',
            }
        }
    },
    methods: {
        copyText(event) {
            let input = document.createElement('input')
            input.setAttribute('type', 'text')
            input.setAttribute('value', event.target.textContent.trim())
            document.body.append(input)
            input.select()
            document.execCommand('copy')
            input.remove()
        }
    },
    template:
    `
    <div class="row" :style="[hover ? active : '', rowStyle]" @mouseover="hover = true" @mouseleave="hover = false">
        <div class="col">{{ info }}</div>
        <div class="col" @click="copyText($event)" :style="valueStyle"  >
            {{ val }}
            <span :style="buttonStyle" v-if="hover">
                <i class="fa fa-copy"></i>
            </span>
        </div>
    </div>
    `
})

var app = new Vue({
    el: '#app'
})
