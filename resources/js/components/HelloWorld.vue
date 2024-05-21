<template>
    <div>
        <color-picker v-model:pureColor="pureColor" v-on:update:pureColor="handleColorChange"
            v-model:gradientColor="gradientColor" />
        {{ pureColor }}
    </div>
</template>

<script>
import { ColorPicker } from "vue3-colorpicker";
import "vue3-colorpicker/style.css";

export default {
    components: { ColorPicker },
    data() {
        return {
            pureColor: "#000",
            gradientColor: "#000",
        }
    },
    mounted() {
        this.pureColor = this.state;
        console.log(this.state);
    },
    methods: {
        handleColorChange(ev) {
            window.$commitWireState(this.uuid, { color: ev });
        }
    },
    props: ['state', 'uuid'],
}
</script>