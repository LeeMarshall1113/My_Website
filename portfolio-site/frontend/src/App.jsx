import { useEffect } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { fetchRepos } from './features/reposSlice';
export default function App() {
  const dispatch = useDispatch();
  const repos = useSelector(s => s.repos.items);
  useEffect(() => { dispatch(fetchRepos()); }, []);
  return (
    <main style={{fontFamily:'sans-serif',padding:'2rem'}}>
      <h1>Lee Marshall · Projects</h1>
      <div style={{display:'grid',gap:'1rem',gridTemplateColumns:'repeat(auto-fill,minmax(250px,1fr))'}}>
        {repos.map(r => (
          <a key={r.id} href={r.html_url} style={{border:'1px solid #ddd',padding:'1rem',borderRadius:'8px'}}>
            <h2>{r.name}</h2>
            <p>{r.description}</p>
          </a>
        ))}
      </div>
    </main>
  );
}
