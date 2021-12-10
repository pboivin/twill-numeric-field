<template>
    <!-- eslint-disable -->
    <a17-inputframe
        :error="error"
        :note="note"
        :label="label"
        :name="name"
        :required="required"
    >
        <div class="form__field">
            <vue-numeric
                :precision="precision"
                :currency="currency"
                :decimal-separator="decimalSeparator"
                :thousand-separator="thousandSeparator"
                :name="name"
                v-model="value"
                @blur="onBlur"
            ></vue-numeric>
        </div>
    </a17-inputframe>
</template>

<script>
/* eslint-disable */

import InputMixin from '@/mixins/input'
import FormStoreMixin from '@/mixins/formStore'
import InputframeMixin from '@/mixins/inputFrame'

import VueNumeric from 'vue-numeric'

import { hello } from './TwillNumericInput/utils'

export default {
    mixins: [InputMixin, InputframeMixin, FormStoreMixin],

    components: { VueNumeric },

    props: {
        name: {
            type: String,
            required: true,
        },
        initialValue: {
            type: Number,
            default: 0,
        },
        precision: {
            type: Number,
            default: 2,
        },
        currency: {
            type: String,
            default: '$',
        },
        decimalSeparator: {
            type: String,
            default: '.',
        },
        thousandSeparator: {
            type: String,
            default: '',
        },
    },

    data() {
        return {
            value: this.initialValue,
        }
    },

    methods: {
        updateFromStore(newValue) {
            if (typeof newValue === 'undefined') newValue = ''

            if (this.value !== newValue) {
                this.value = newValue
            }
        },
        updateValue(newValue) {
            if (this.value !== newValue) {
                this.value = newValue

                this.saveIntoStore()
            }
        },
        onBlur(event) {
            const newValue = event.target.value
            this.updateValue(newValue)
        },
    },

    mounted() {
        hello()
    }
}
</script>

<style lang="scss" scoped>
.form__field {
    display: flex;
    align-items: center;
    padding: 0 15px;
    overflow: visible;

    input {
        @include resetfield;
        width: 100%;
        height: 43px;
        line-height: 43px;
        color: inherit;
        padding: 0;
    }
}
</style>
