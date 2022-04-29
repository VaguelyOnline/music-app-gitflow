<template>
    
    <h1 :class="{ 'text-danger': names.length == 0 }">{{ message }} World!</h1>
    <h1 :class=" 'text-warning' ">{{ message }} World!</h1>
    <h1 :class="getClass()">{{ message }} World!</h1>

    <p @click="incrementCount">
        The count is: <span class="badge bg-primary">{{ count }}</span>
    </p>

    <input class="form-control" placeholder="Enter your name" v-model="name">
    <button @click="addToList" class="btn btn-outline-secondary">Add to list</button>

    <h3 v-for="(name, index) in names" :key="index">
        Hi there {{ name }}!
    </h3>

    <img :src="path" class="img-responsive">
    
</template>

<script>
export default {
    name: 'HelloWorld',
    data() {
        return {
            count: 0,
            message: 'Hi',
            name: '',
            names: [
                // 'Alice',
                // 'Bob',
                // 'Carol'
            ],
            path: 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8b/Jackie_Chan_July_2016.jpg/440px-Jackie_Chan_July_2016.jpg'
        };
    },

    // component setup logic!
    mounted() {
        alert('hi!');
    },

    methods: {
        incrementCount() {
            this.count++;
        },

        reset() {
            this.count = 0;
        },

        addToList() {
            this.names.push(this.name);
            this.name = '';
        },
        getClass() {
            return 'text-success';
        }
    }
}
</script>

<style scoped>
    p {
        cursor: pointer;
        background-color: blue;
        color: white;
        font-size: 30px;
    }
</style>