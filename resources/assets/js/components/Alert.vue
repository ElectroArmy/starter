<template>
    
        <div class="Alert Alert--Success" v-show="isVisible">
            You are now signed in!
            <button type="button" @click="hideModal">x</button>
        
        </div><!-- /.Alert -->
            
        
</template>

<script>
    export default {
        
        props: ['type'],
        
        
        data() {
            return {
            isVisible: true
            };
        
        },
        
        mounted() {
            console.log('Component ready.')
        },
        
        methods: {
            hideModal() {
                this.isVisible = false;
            }
        }
        
        
    }
</script>

<style>
    .Alert {
        padding: 10px;
        position: relative;
        min-width: 100%;
        min-height: 50px;
        
    }
    
    .Alert--Info {
        background: #e3e3e3;
    }
    
    .Alert--Success {
        background: green;
        color: white;
        
    }
    
    .Alert--Error {
        background: red;
        color: white;
       
    }
    
    
    
    
</style>