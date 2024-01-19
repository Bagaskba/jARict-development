import React, { useEffect, useContext } from 'react'
import {
  Text,
  View,
  StyleSheet,
  ScrollView,
  Image,
  TouchableOpacity,
} from 'react-native'
import ScreenTemplate from '../../components/ScreenTemplate'
import Button from '../../components/Button'
import { colors, fontSize } from 'theme'
import { ColorSchemeContext } from '../../context/ColorSchemeContext'
import { UserDataContext } from '../../context/UserDataContext'
import { useNavigation } from '@react-navigation/native'
import Headerlogo from '../../components/Headerlogo'
import {
  logo,
  produk,
  reservasi,
  serum,
  toner,
  facial,
  cream,
} from '../../../assets'
import cart from '../cart/cart'

export default function Follow() {
  const navigation = useNavigation()
  const { userData } = useContext(UserDataContext)
  const { scheme } = useContext(ColorSchemeContext)
  const isDark = scheme === 'dark'
  const colorScheme = {
    text: isDark ? colors.white : colors.primaryText,
  }

  useEffect(() => {
    console.log('Produk screen')
  }, [])

  const onCardPress = () => {
    navigation.navigate('cart')
  }
  const openKeranjang = () => {
    navigation.navigate('keranjang')
  }

  return (
    <ScreenTemplate>
      <Headerlogo />
      <View
        style={{
          flexDirection: 'row',
          alignItems: 'center',
          paddingTop: 20,
          justifyContent: 'space-between',
          paddingHorizontal: 20,
        }}
      >
        <Text
          style={{
            color: colors.warnaFont,
            fontSize: 30,
            textTransform: 'uppercase',
            fontWeight: 'bold',
          }}
        >
          Produk
        </Text>
        <TouchableOpacity
          onPress={openKeranjang}
          style={{
            borderWidth: 1,
            borderColor: colors.warnaFont,
            borderRadius: 5,
          }}
        >
          <Text style={{ color: 'red', fontWeight: 'bold', fontSize: 18 }}>
            Pesanan Saya
          </Text>
        </TouchableOpacity>
      </View>
      <ScrollView style={styles.main}>
        {/* dummy */}
        <View style={{ flexDirection: 'row' }}>
          <ScrollView
            horizontal
            showsHorizontalScrollIndicator={false} // Menghilangkan indikator penggeseran
          >
            <TouchableOpacity
              style={[styles.cardContainer]}
              onPress={onCardPress}
            >
              <View
                style={[styles.card, { backgroundColor: colors.warnaFont }]}
              >
                <Image source={facial} style={styles.cardImage} />
                <View
                  style={{
                    backgroundColor: colors.grey,
                    width: 300,
                    paddingVertical: 10,
                  }}
                >
                  <Text style={[styles.cardTitle, { color: colors.warnaFont }]}>
                    Facial Wash
                  </Text>
                  <Text style={[styles.cardTitle, { color: colors.warnaFont }]}>
                    Rp. 80.000,
                  </Text>
                </View>
              </View>
            </TouchableOpacity>
            {/* card 2 */}
            <TouchableOpacity
              style={styles.cardContainer}
              onPress={onCardPress}
            >
              <View
                style={[styles.card, { backgroundColor: colors.warnaFont }]}
              >
                <Image source={cream} style={styles.cardImage} />
                <View
                  style={{
                    backgroundColor: colors.grey,
                    width: 300,
                    paddingVertical: 10,
                  }}
                >
                  <Text style={[styles.cardTitle, { color: colors.warnaFont }]}>
                    Day Cream
                  </Text>
                  <Text style={[styles.cardTitle, { color: colors.warnaFont }]}>
                    Rp. 95.000,
                  </Text>
                </View>
              </View>
            </TouchableOpacity>
          </ScrollView>
        </View>
        {/* view 2 */}
        <View style={{ flexDirection: 'row' }}>
          <ScrollView
            horizontal
            showsHorizontalScrollIndicator={false} // Menghilangkan indikator penggeseran
          >
            <TouchableOpacity
              style={[styles.cardContainer]}
              onPress={onCardPress}
            >
              <View
                style={[styles.card, { backgroundColor: colors.warnaFont }]}
              >
                <Image source={toner} style={styles.cardImage} />
                <View
                  style={{
                    backgroundColor: colors.grey,
                    width: 300,
                    paddingVertical: 10,
                  }}
                >
                  <Text style={[styles.cardTitle, { color: colors.warnaFont }]}>
                    Toner
                  </Text>
                  <Text style={[styles.cardTitle, { color: colors.warnaFont }]}>
                    Rp. 80.000,
                  </Text>
                </View>
              </View>
            </TouchableOpacity>
            {/* card 2 */}
            <TouchableOpacity
              style={styles.cardContainer}
              onPress={onCardPress}
            >
              <View
                style={[styles.card, { backgroundColor: colors.warnaFont }]}
              >
                <Image source={serum} style={styles.cardImage} />
                <View
                  style={{
                    backgroundColor: colors.grey,
                    width: 300,
                    paddingVertical: 10,
                  }}
                >
                  <Text style={[styles.cardTitle, { color: colors.warnaFont }]}>
                    Serum
                  </Text>
                  <Text style={[styles.cardTitle, { color: colors.warnaFont }]}>
                    Rp. 125.000,
                  </Text>
                </View>
              </View>
            </TouchableOpacity>
          </ScrollView>
        </View>
      </ScrollView>
    </ScreenTemplate>
  )
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center',
    width: '100%',
  },
  field: {
    fontSize: fontSize.middle,
    textAlign: 'center',
  },
  cardContainer: {
    marginVertical: 10,
    borderRadius: 10,
    overflow: 'hidden',
    paddingHorizontal: 20,
    paddingTop: 10,
  },
  card: {
    flexDirection: 'column',
    justifyContent: 'center',
    alignItems: 'center',
    padding: 5,
  },
  cardImage: {
    width: '80%', // Sesuaikan ukuran gambar
    height: 200, // Sesuaikan ukuran gambar

    marginBottom: 10,
  },
  cardTitle: {
    fontSize: fontSize.xLarge,
    textAlign: 'center',
    fontWeight: 'bold',
    textTransform: 'uppercase',
  },
})
