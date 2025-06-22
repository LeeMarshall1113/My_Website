import { createAsyncThunk, createSlice } from '@reduxjs/toolkit';
export const fetchRepos = createAsyncThunk('repos/fetch', async () => {
  const res = await fetch('/api/repos');
  return res.json();
});
const slice = createSlice({
  name: 'repos',
  initialState: { items: [] },
  extraReducers: builder => {
    builder.addCase(fetchRepos.fulfilled, (state, action) => { state.items = action.payload; });
  }
});
export default slice.reducer;
