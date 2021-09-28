<template>
    <div class="min-h-screen flex items-center justify-center bg-blue-400">
        <!-- Post detail-->
        <div class="bg-white p-16 rounded shadow-2xl w-2/3">
            <h2 class="text-3xl font-bold mb-10 text-gray-800">Create Post</h2>
            <form @submit.prevent="createPost">
                <div class="space-y-5">
                    <div>
                        <label class="block mb-1 font-bold text-gray-500">Name</label>
                        <input class="w-full border-2 border-gray-200 p-3 rounded outline-none focus:border-purple-500" v-model="name">
                    </div>
                    <div>
                        <label class="block mb-1 font-bold text-gray-500">Category</label>
                        <select v-model="category">
                             <option disabled value="">Please select one</option>
                            <option  v-for="category1 in categories" :key="category1.id" :value="category1.name">{{category1.name}}</option>
                        </select>
                    </div>
                    <div>
                        <label class="block mb-1 font-bold text-gray-500">Content</label>
                        <input class="w-full border-2 border-gray-200 p-3 rounded outline-none focus:border-purple-500" v-model="content">
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
            categories: [],
            name: "",
            category: "",
            content: "",
        };
    },
    created() {
        let url = "/api/admin/posts/viewcreate";
        axios
            .get(url)
            .then((result) => {
                console.log(result);
                if (result.status == 200) {
                    this.categories = result.data.categories;
                } else alert("That bai");
            })
            .catch((error) => {
                console.log(error);
                throw new Error(`API ${error}`);
            });
    },

    methods: {
        createPost() {
            let url = "/api/admin/posts/create";
            let json = {
                name: this.name,
                category: this.category,
                content: this.content,
            };
            axios
                .post(url, json)
                .then((result) => {
                    console.log(result.data);
                    alert("Them moi thanh cong");
                    this.name = "";
                    this.content = "";
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
