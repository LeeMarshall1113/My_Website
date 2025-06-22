import { configureStore } from '@reduxjs/toolkit';
import reposReducer from './features/reposSlice';
export default configureStore({ reducer: { repos: reposReducer } });
