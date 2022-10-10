export default {
  schools(state) {
    return state.schools;
  },
  searchedSchools(state) {
    return state.schools && state.schools.length > 0;
  }
};