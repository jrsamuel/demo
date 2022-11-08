<template>
    <div class="bg-white rounded-lg p-4 ">
        <div class="flex w-full items-center">
            <div class="flex flex-grow items-center">
                <Icon icon="charm:message"
                      class="h-8 w-8 " />
                <div class="ml-2 text-gray-800 whitespace-nowrap">{{ chirp.user.name }}</div>
                <small class="text-sm ml-2 text-gray-600 whitespace-nowrap">{{ dayjs(chirp.created_at).fromNow()
                }}</small>
                <small v-if="chirp.created_at !== chirp.updated_at"
                       class="text-sm text-gray-600"> &middot; edited</small>
            </div>
            <Dropdown v-if="chirp.user.id === $page.props.auth.user.id">
                <template #trigger>
                    <button>
                        <Icon icon="ci:more-horizontal"
                              class="h-4 text-gray-600 w-4" />
                    </button>
                </template>
                <template #content>
                    <button class="text-left text-sm w-full py-2 px-4 transition ease-in-out text-gray-700 leading-5 duration-150 block hover:bg-gray-100 focus:bg-gray-100"
                            @click="editing = true">
                        Edit
                    </button>
                    <DropdownLink as="button"
                                  :href="route('chirps.destroy', chirp.id)"
                                  method="delete">
                        Delete
                    </DropdownLink>
                </template>
            </Dropdown>
        </div>
        <form v-if="editing"
              @submit.prevent="form.put(route('chirps.update', chirp.id), { onSuccess: () => editing = false })">
            <textarea v-model="form.message"
                      class="rounded-md border-gray-300 shadow-sm mt-4 w-full text-gray-900 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
            <InputError :message="form.errors.message"
                        class="mt-2" />
            <div class="space-x-2">
                <PrimaryButton class="mt-4">Save</PrimaryButton>
                <button class="mt-4"
                        @click="cancel">Cancel</button>
            </div>
        </form>
        <p v-else
           class="mt-4 text-lg text-gray-900">{{ chirp.message }}</p>
    </div>
</template>

<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';
import { useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
dayjs.extend(relativeTime);

const props = defineProps(['chirp']);

const form = useForm({
    message: props.chirp.message,
});

const editing = ref(false);


function cancel() {
    editing.value = false;
    form.reset();
    form.clearErrors();
}



</script>
