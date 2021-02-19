const state = {
  billboards: [],
};
const getters = {
  getBillboards(state) {
    return state.billboards;
  },
};
const actions = {};
const mutations = {
  SET_BILLBOARD(state, value) {
    state.billboards = value;
  },
  ADD_BILLBOARD(state, value) {
    const arrayOfBillboardsId = state.billboards.map(
      (billboard) => billboard.id
    );
    if (!arrayOfBillboardsId.includes(value.id)) {
      state.billboards.push(value);
    }
  },
  REMOVE_BILLBOARD(state, index) {
    const arrayOfBillboardsId = state.billboards.map(
      (billboard) => billboard.id
    );
    const id = arrayOfBillboardsId.indexOf(index);
    state.billboards.splice(id, 1);
  },
};
export default {
  state,
  getters,
  actions,
  mutations,
};
