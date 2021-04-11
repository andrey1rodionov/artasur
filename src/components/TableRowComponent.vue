<template>
  <tr>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
      <div class="flex items-center">
        <div>
          <div class="text-sm leading-5 text-gray-800">{{ id }}</div>
        </div>
      </div>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
      <div class="text-sm leading-5 text-blue-900">{{ title }}</div>
    </td>
    <td
      class="py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5"
    >
      <router-link
        class="px-5 py-2 border-footer-textHover border text-footer-textHover rounded transition duration-300 hover:bg-footer-textHover hover:text-white focus:outline-none"
        :to="{ name: 'BillboardPanel', params: { id: id } }"
        >Изменить</router-link
      >
    </td>
    <td
      class="py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5"
      @click="deleteBillboard()"
    >
      <button
        class="px-5 py-2 border-footer-textHover border text-footer-textHover rounded transition duration-300 hover:bg-footer-textHover hover:text-white focus:outline-none"
      >
        Удалить
      </button>
    </td>
  </tr>
</template>

<script>
export default {
  props: ["id", "title"],
  methods: {
    deleteBillboard() {
      this.$emit("deleteClicked", { id: this.id, title: this.title });
    },
  },
};
</script>

<style scoped></style>
