import type { Metadata } from 'next';
import { Inter, Archivo_Black, JetBrains_Mono } from 'next/font/google';
import './globals.css';

const inter = Inter({ subsets: ['latin'], variable: '--font-inter' });
const archivoBlack = Archivo_Black({ weight: '400', subsets: ['latin'], variable: '--font-archivo' });
const jetbrainsMono = JetBrains_Mono({ subsets: ['latin'], variable: '--font-mono' });

export const metadata: Metadata = {
  title: 'Kartu Pintar | Kartu NFC dan QR Review Google Maps',
  description: 'Kartu Pintar adalah kartu NFC dan QR yang memudahkan pelanggan memberikan review Google Maps. Cocok untuk UMKM, restoran, toko, hotel, dan bisnis lainnya.',
};

export default function RootLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return (
    <html lang="id" className="h-full">
      <body className={`${inter.variable} ${archivoBlack.variable} ${jetbrainsMono.variable} min-h-full font-sans antialiased text-google-text`}>
        {children}
      </body>
    </html>
  );
}
