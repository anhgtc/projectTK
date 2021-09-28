<template>
    <div class="min-h-screen flex items-center justify-center bg-blue-400">
        <!-- Category detail-->
        <div class="bg-white p-16 rounded shadow-2xl w-2/3">
            <h2 class="text-3xl font-bold mb-10 text-gray-800">Category detail</h2>
            <form @submit.prevent="editCategory">
                 <div class="space-y-5">
                <div>
                    <label class="block mb-1 font-bold text-gray-500">Name</label>
                    <input class="w-full border-2 border-gray-200 p-3 rounded outline-none focus:border-purple-500" v-model="name">
                </div>
                <button type="submit" class="block w-full bg-yellow-400 hover:bg-yellow-300 p-4 rounded text-yellow-900 hover:text-yellow-800 transition duration-300">SAVE</button>
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
            category: {},
            name: "",
        };
    },
    created() {
        let url = "/api/admin/categories/" + this.$route.params.id;
        axios
            .get(url)
            .then((result) => {
                console.log(result);
                if (result.status == 200) {
                    this.category = result.data.category;
                    this.name = this.category.name;
                }
                else alert("That bai");
            })
            .catch((error) => {
                console.log(error);
                throw new Error(`API ${error}`);
            });
    },

    methods: {
        editCategory() {
            let url = "/api/admin/categories/update/" + this.$route.params.id;
            let json = {
                name: this.name,
            }
            axios
                .post(url, json)
                .then(result => {
                    console.log(result.data)
                    alert('Cap nhat thong tin thanh cong')
                })
                .catch(error => {
                    console.log(error)
                    alert('Khong thanh cong')
                    throw new Error(`API ${error}`)
                })
        }
    }
};
</script>
