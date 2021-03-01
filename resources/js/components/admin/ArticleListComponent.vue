<template>
    <div>
        <el-input v-model="input" placeholder="请输入内容"></el-input>
        <el-button type="primary" plain @click="primaryClick">主要按钮</el-button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                input: ''
            }
        },
        methods: {
            primaryClick(){
                axios({
                    url:'user/textaxios',
                    data:{
                        'name':'fanhuilin'
                    },
                    method:'POST'
                }).then(res=>{
                    console.log(res.data)
                })
            }
        },
        mounted() {

        }
    }
</script>

<style scoped>

</style>
