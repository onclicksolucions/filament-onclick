<template>
    <div>
        
    </div>
</template>

<script>
export default {
    data() {
        return {
            
        }
    },
    mounted() {
        
    },
    methods: {
        handleChange(ev) {
            window.$commitWireState(this.uuid, ev);
        }
    },
    props: ['state', 'uuid'],
}
</script>