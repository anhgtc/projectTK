<template>
    <div>
        <div class="overflow-x-auto">
            <div class="min-w-screen min-h-screen bg-gray-100 flex justify-center bg-gray-100 font-sans overflow-hidden">
                <div class="w-full lg:w-5/6">
                    <div class="bg-white shadow-md rounded my-6">
                        <table class="min-w-max w-full table-auto text-center ">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 text-sm leading-normal">
                                    <th class="py-3 px-6 text-center">ID</th>
                                    <th class="py-3 px-6 text-center">NAME</th>
                                    <th class="py-3 px-6 text-center">EMAIL</th>
                                    <th class="py-3 px-6 text-center">USERNAME</th>
                                    <th class="py-3 px-6 text-center">PASSWORD</th>
                                    <th class="py-3 px-6 text-center">ACTION</th>
                                </tr>
                            </thead>

                            <tbody class="text-gray-600 text-sm font-light">
                                <tr v-for="(user, index) in users" :key="index" class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex justify-center">
                                            <span class="font-medium">{{user.id}}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex justify-center">
                                            <span>{{user.name}}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex justify-center">
                                            <span>{{user.email}}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex justify-center">
                                            <span>{{user.username}}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex justify-center">
                                            <span>{{user.password}}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <router-link :to="{name:'BackendUsersEdit', params:{id: user.id}}">
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </div>
                                            </router-link>
                                            <button @click="deleteUser(user.id, index)">
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <router-link class="fixed bottom-10 right-10" :to="{name:'BackendUsersCreate'}">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">New account</button>
        </router-link>
    </div>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            users: [],
        };
    },
    created() {
        let url = "/api/admin/users";
        axios
            .get(url)
            .then((result) => {
                console.log(result)
                if (result.status == 200) this.users = result.data.users;
                else alert("That bai");
            })
            .catch((error) => {
                throw new Error(`API ${error}`);
            });
    },
    methods: {
        deleteUser($id, $index) {
            let url = "/api/admin/users/delete/" + $id;
            axios
                .post(url)
                .then((result) => {
                    if (result.status == 200) {
                        alert("Xoa thanh cong");
                        this.users.splice($index, 1);
                    }
                    else alert("That bai");
                })
                .catch((error) => {
                    throw new Error(`API ${error}`);
                });
        },
    },
};
</script>
