<template>
    <div class="min-h-screen flex items-center justify-center bg-blue-400">
        <!-- User detail-->
        <div class="bg-white p-16 rounded shadow-2xl w-2/3">
            <h2 class="text-3xl font-bold mb-10 text-gray-800">Create User</h2>
            <form @submit.prevent="createUser">
                <div class="space-y-5">
                    <div>
                        <label class="block mb-1 font-bold text-gray-500">Name</label>
                        <input class="w-full border-2 border-gray-200 p-3 rounded outline-none focus:border-purple-500" v-model="name">
                    </div>
                    <div>
                        <label class="block mb-1 font-bold text-gray-500">Email</label>
                        <input class="w-full border-2 border-gray-200 p-3 rounded outline-none focus:border-purple-500" v-model="email">
                    </div>
                    <div>
                        <label class="block mb-1 font-bold text-gray-500">Username</label>
                        <input class="w-full border-2 border-gray-200 p-3 rounded outline-none focus:border-purple-500" v-model="username">
                    </div>
                    <div>
                        <label class="block mb-1 font-bold text-gray-500">Password</label>
                        <input class="w-full border-2 border-gray-200 p-3 rounded outline-none focus:border-purple-500" v-model="password">
                    </div>
                    <button type="submit" class="block w-full bg-yellow-400 hover:bg-yellow-300 p-4 rounded text-yellow-900 hover:text-yellow-800 transition duration-300">CREATE</button>
                </div>
            </form>

            <br>
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
            let url = "/api/admin/users/create";
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
                    alert("Them moi thanh cong");
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
