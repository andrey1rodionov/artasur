<template>
  <div class="w-full h-full">
    <aside
      class="flex flex-col items-center bg-footer-bg text-gray-700 shadow h-full fixed"
    >
      <div class="h-16 flex items-center w-full">
        <a class="h-6 w-6 mx-auto" href="/admin/billboards">
          <img
            class="h-6 w-6 mx-auto"
            src="../assets/images/logo_small.png"
            alt="artasur-logo"
          />
        </a>
      </div>
      <ul>
        <li class="hover:bg-footer-textHover">
          <a
            href="/admin/billboard/new"
            class="h-16 px-6 flex flex justify-center items-center w-full focus:text-orange-500 fa fa-plus text-white"
          >
          </a>
        </li>
      </ul>
      <div class="mt-auto h-16 flex items-center w-full">
        <a
          href="/admin"
          class="h-16 w-10 mx-auto flex flex justify-center items-center w-full focus:text-orange-500 hover:bg-red-500 focus:outline-none"
          @click="exit()"
        >
          <svg
            class="h-5 w-5 text-white"
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
            <polyline points="16 17 21 12 16 7"></polyline>
            <line x1="21" y1="12" x2="9" y2="12"></line>
          </svg>
        </a>
      </div>
    </aside>
    <div class="h-screen w-full pl-14">
      <!-- component -->
      <div
        class="align-middle inline-block w-full py-4 overflow-hidden bg-white px-12 fixed ml-2"
      >
        <div class="flex justify-between">
          <div
            class="inline-flex border rounded w-7/12 px-2 lg:px-6 h-12 bg-transparent w-full mr-12"
          >
            <div
              class="flex flex-wrap items-stretch w-full h-full mb-6 relative"
            >
              <div class="flex">
                <span
                  class="flex items-center leading-normal bg-transparent rounded rounded-r-none border border-r-0 border-none lg:px-3 py-2 whitespace-no-wrap text-grey-dark text-sm"
                >
                  <svg
                    width="18"
                    height="18"
                    class="w-4 lg:w-auto"
                    viewBox="0 0 18 18"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M8.11086 15.2217C12.0381 15.2217 15.2217 12.0381 15.2217 8.11086C15.2217 4.18364 12.0381 1 8.11086 1C4.18364 1 1 4.18364 1 8.11086C1 12.0381 4.18364 15.2217 8.11086 15.2217Z"
                      stroke="#455A64"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M16.9993 16.9993L13.1328 13.1328"
                      stroke="#455A64"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </span>
              </div>
              <input
                type="text"
                class="flex-shrink flex-grow flex-auto leading-normal tracking-wide w-px flex-1 border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs lg:text-xs lg:text-base text-gray-500 font-thin"
                placeholder="Поиск по названию"
                v-model="inputValue"
              />
            </div>
          </div>
        </div>
      </div>
      <div
        class="align-middle inline-block shadow overflow-hidden w-full bg-white shadow-dashboard px-8 pt-3 mt-20"
      >
        <table class="min-w-full">
          <thead>
            <tr>
              <th
                class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 w-1/12 text-footer-textHover tracking-wider"
              >
                ID
              </th>
              <th
                class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-footer-textHover tracking-wider"
              >
                Название
              </th>
              <th
                class="px-6 py-3 border-b-2 border-gray-300 w-12-percent"
              ></th>
              <th
                class="px-6 py-3 border-b-2 border-gray-300 w-12-percent"
              ></th>
            </tr>
          </thead>
          <tbody class="bg-white">
            <TableRowComponent
              v-for="mark in filterBillboards(billboardsData)"
              :key="mark.id"
              :id="mark.id"
              :title="mark.title"
              @deleteClicked="deleteBillboard"
            >
            </TableRowComponent>
          </tbody>
        </table>
        <div
          class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans"
        ></div>
      </div>
    </div>
  </div>
</template>

<script>
import TableRowComponent from "@/components/TableRowComponent";
import axios from "axios";

export default {
  components: { TableRowComponent },
  data() {
    return {
      billboardsData: [],
      inputValue: "",
    };
  },
  methods: {
    exit() {
      localStorage.removeItem("authKey");
    },
    filterBillboards(presets) {
      return presets.filter((preset) => {
        let regex = new RegExp("(" + this.inputValue + ")", "i");
        return preset.title.match(regex);
      });
    },
    deleteBillboard({ id, title }) {
      this.$swal({
        title: "Подтверждение на удаление",
        text: `Вы действительно хотите удалить билборд ${title}?`,
        buttons: ["Отмена", "Удалить"],
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          axios
            .post("/api.php", { action: "delete", data: id })
            .then((res) => {
              if (res.status === 200) {
                this.fetchBillboardsData();
                this.$swal({
                  icon: "success",
                  title: "Удалено!",
                  text: "Билборд успешно удален",
                  buttons: false,
                  timer: 3000,
                });
              }
            })
            .catch((error) => {
              this.$swal({
                icon: "error",
                title: "Упс...",
                text: "Ошибка при удалении",
                buttons: false,
                timer: 3000,
              });
              console.log(error);
            });
        }
      });
    },
    fetchBillboardsData() {
      axios
        .get("/api.php", { params: { action: "all" } })
        .then((response) => (this.billboardsData = response.data))
        .catch((error) => console.log(error));
    },
  },
  mounted() {
    if (localStorage.getItem("authKey") !== "1111") {
      this.$router.push("/admin");
    }
    this.fetchBillboardsData();
  },
};
</script>

<style scoped></style>
