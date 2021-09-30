<template>
    <div class="bg-grey-lighter min-h-screen flex flex-col">
        <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
            <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                <h1 class="mb-8 text-3xl text-center">Sign up</h1>
                <form @submit.prevent="createUser">
                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" v-model="name" placeholder="Name" />
                    <input type="email" class="block border border-grey-light w-full p-3 rounded mb-4" v-model="email" placeholder="Email" />
                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" v-model="username" placeholder="Username" />
                    <input type="password" class="block border border-grey-light w-full p-3 rounded mb-4" v-model="password" placeholder="Password" />
                    <button type="submit" class="w-full text-center py-3 rounded bg-green-400 text-white hover:bg-green-dark focus:outline-none my-1">Create Account</button>
                </form>
            </div>
            <div class="text-grey-dark mt-6">
                Already have an account?
                <a href="/login" class="no-underline border-b border-blue-500  text-blue-500">
                    Log in
                </a>.
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            name: "",
            email: "",
            username: "",
            password: "",
        };
    },
    methods: {
        createUser() {
            let url = "/api/web/users/register";
            let json = {
                name: this.name,
                email: this.email,
                username: this.username,
                password: this.password,
            };
            axios
                .post(url, json)
                .then((result) => {
                    console.log(result.data);
                    alert("Dang ki thanh cong");
                    this.name = "";
                    this.email = "";
                    this.username = "";
                    this.password = "";
                })
                .catch((error) => {
                    console.log(error);
                    alert("Khong thanh cong");
                    throw new Error(`API ${error}`);
                });
        },
    },
};
</script>
